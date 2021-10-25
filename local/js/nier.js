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
  account, // the account object that is connecting
  "nft.battlemon.testnet",
  {
    // name of contract you're connecting to
    viewMethods: ["nft_total_supply"], // view methods do not change state but usually return a value
    sender: account, // account object to initialize and sign transactions.
  }
);

contract.nft_total_supply().then(value => {
	console.log(value);
});
