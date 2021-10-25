'use strict';

import * as nearAPI from "/node_modules/near-api-js/dist/near-api-js.min.js";

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

const account = await near.account("nft.battlemon.testnet");

const contract = new nearApi.Contract(
  account,
  "nft.battlemon.testnet",
  {
    viewMethods: ["nft_total_supply", "nft_tokens"],
    sender: account,
  }
);

contract.nft_tokens().then(data => {
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