'use strict';

import * as nearAPI from "/node_modules/near-api-js/dist/near-api-js.min.js";

const contractName = 'dev-1636641321126-54010839869553';

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

const account = await near.account(contractName);

const contract = new nearApi.Contract(
  account, contractName,
  {
    viewMethods: ["nft_total_supply", "nft_tokens", "buy"],
    sender: account,
  }
);

window.fillTemplate = (template, values) => {
	let html = template.innerHTML;

	for(let i in values) {
		html = html.replaceAll('#' + i + '#', values[i]);
	}

	return html;
}

window.initFilterSliders = () => {
	document.querySelectorAll('.slider[data-values]').forEach(slider => {
		let values = slider.dataset.values.split(',');
		let min = Math.min.apply(null, values);
		let max = Math.max.apply(null, values);

		let sliderOb = noUiSlider.create(slider, {
			start: parseInt(min),
			behaviour: 'snap',
			range: {
				'min': [parseInt(min)],
				'max': [parseInt(max)]
			},
		});

		sliderOb.on('update', (values) => {
			console.log(values, slider.querySelectorAll('.noUi-touch-area'));
			slider.querySelector('.noUi-touch-area').innerHTML = parseInt(values[0]);
		});
	});
}

window.applyFilter = () => {
	jsNftList.childNodes.forEach(item => {
		let index = item.dataset.index;
		let data = window.cards[index];
		let props = data.properties;

		let hide = false;

		if(jsSearchField.value) {
			hide = jsSearchField.token_id == jsSearchField.value;
		}

		if(!hide) {
			jsMainFilter.querySelectorAll(':checked').forEach(checkbox => {
				if(prop[checkbox.name] != checkbox.value) {
					hide = true;
				}
			});
		}

		if(!hide) {

		}
	})
}

contract.nft_tokens().then(data => {
	console.log(data);
	if(data != null) {
		jsNftList.innerHTML = '';

		let newH = '';

		let props = {};

		window.cards = data;

		data.forEach(item => {
			let values = {
				url: '/item/?id=' + item.token_id,
				img: item.metadata.media,
				id: item.token_id
			};

			if(values.img == 'blabla') {
				values.img = '/local/img/fighters-23.webp';
			}

			let tmpl = fillTemplate(tmplNftPreview, values);

			newH += tmpl;

			if('properties' in item) {
				for(let prop_code in item.properties) {
					let value = item.properties[prop_code];

					if(!(prop_code in props)) {
						props[prop_code] = [value];
					} else {
						if(props[prop_code].indexOf(value) < 0) {
							props[prop_code].push(value);
						}
					}
				}
			}

		});

		if(props) {
			let filterHTML = '';
			for(let prop_code in props) {
				if(typeof(props[prop_code][0]) == 'number') {
					console.log('its a number');
					let values = {
						name: prop_code,
						values: props[prop_code].join(',')
					}

					let sliderHTML = fillTemplate(tmplFilterSlider, values);

					filterHTML += sliderHTML;

				} else {
					let listHTML = '';

					props[prop_code].forEach(value => {
						let values = {
							code: prop_code,
							name: value,
							value: value
						};

						let checkboxHTML = fillTemplate(tmplFilterItemCheckbox, values);

						listHTML += checkboxHTML;
					});

					let values = {
						name: prop_code,
						list: listHTML
					};

					let itemHTML = fillTemplate(tmplFilterItem, values);

					filterHTML += itemHTML;
				}
			}

			jsMainFilter.innerHTML += filterHTML;

			initFilterSliders();
			jsMainFilter.querySelectorAll('[type="checkbox"]').forEach(checkBox => checkBox.addEventListener('change', applyFilter));
		}

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