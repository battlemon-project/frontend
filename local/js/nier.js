'use strict';

import * as nearAPI from "/node_modules/near-api-js/dist/near-api-js.min.js";

const contractName = 'nft.battlemon.testnet';

const config = {
  networkId: "testnet",
  nodeUrl: "https://rpc.testnet.near.org",
  walletUrl: "https://wallet.testnet.near.org",
  helperUrl: "https://helper.testnet.near.org",
  explorerUrl: "https://explorer.testnet.near.org",
  keyStore: new nearApi.keyStores.BrowserLocalStorageKeyStore()
};
const near = await nearApi.connect(config);

const wallet = new nearApi.WalletConnection(near);

console.log(wallet.isSignedIn());

const account = await near.account("nft.battlemon.testnet");

const contract = new nearApi.Contract(
  account, contractName,
  {
    viewMethods: ["nft_total_supply", "nft_tokens", "buy"],
    sender: account,
  }
);

contract.nft_tokens().then(data => {
	console.log(data);
	if(data != null) {
		jsNftList.innerHTML = '';

		let newH = '';

		data.forEach(item => {
			let tmpl = tmplNftPreview.innerHTML;

			let values = {
				url: '/item/?id=' + item.token_id,
				img: item.metadata.media
			};

			['url', 'img'].forEach(i => {
				tmpl = tmpl.replaceAll('#' + i + '#', values[i]);
			});

			newH += tmpl;

		});

		jsNftList.innerHTML = newH;
	}
});

if(wallet.isSignedIn()) {
	const accountId = wallet.getAccountId();
	document.querySelectorAll('.login-form-toggle span').forEach(loginBtn => {
		loginBtn.innerHTML = accountId
	});
} else {
	document.querySelectorAll('.login-form-toggle').forEach(loginBtn => loginBtn.addEventListener('click', function() {
	  wallet.requestSignIn(
	    contractName,
	  );
	}));
}