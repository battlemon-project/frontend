'use strict';

import * as nearAPI from "/node_modules/near-api-js/dist/near-api-js.js";

const contractName = 'dev-1637164324288-46265801137064';
const marketName = 'market.dev-1637164324288-46265801137064';

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

const account = await near.account(contractName);

const contract = new nearApi.Contract(
  account, contractName,
  {
    viewMethods: ["nft_total_supply", "nft_tokens", "nft_token"],
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

if(typeof(jsNftList) != 'undefined') {
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
				slider.querySelector('.noUi-touch-area').innerHTML = parseInt(values[0]) + '%';
			});
		});
	}

	window.applyFilter = () => {
		Array.from(jsNftList.children).forEach(item => {
			let index = item.dataset.index;
			let data = window.cards[index];
			let props = data.properties;

			let hide = false;

			if(jsSearchField.value) {
				console.log(jsSearchField.token_id);
				hide = !jsSearchField.token_id.toLowerCase().startsWith(jsSearchField.value.toLowerCase());
			}

			if(!hide) {
				jsMainFilter.querySelectorAll(':checked').forEach(checkbox => {
					if(props[checkbox.name] != checkbox.value) {
						hide = true;
					}
				});
			}

			if(!hide) {
				jsMainFilter.querySelectorAll('.slider').forEach(slider => {
					hide = parseInt(props[slider.dataset.name]) != parseInt(slider.noUiSlider.get());
				});
			}

			item.style.display = hide ? 'none' : '';
		});
	}

	contract.nft_tokens().then(data => {
		if(data != null) {
			jsNftList.innerHTML = '';

			let newH = '';

			let props = {};

			window.cards = {};

			data.forEach((item, i) => {
				window.cards[item.token_id] = item;

				let values = {
					url: '/item/?id=' + item.token_id,
					img: item.metadata.media,
					id: item.token_id,
					order: data.length - i
				};

				if(values.img == 'blabla' || values.img == 'http://some-link-to-media.com') {
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
						let values = {
							rname: prop_code.replaceAll('_', ' '),
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
								name: value.replaceAll('_', ' '),
								value: value
							};

							let checkboxHTML = fillTemplate(tmplFilterItemCheckbox, values);

							listHTML += checkboxHTML;
						});

						let values = {
							rname: prop_code.replaceAll('_', ' '),
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

			if(typeof(jsSortToogler) != 'undefined') {
				jsSortToogler.addEventListener('click', function() {
					this.classList.toggle('active');
					jsNftList.classList.toggle('sort-reverse');
				});
			}
		}
	});
}


// Auth

window.logout = () => {
	wallet.signOut();
	location.reload();
}

if(wallet.isSignedIn()) {
	const accountId = wallet.getAccountId();

	jsLoginBox.style.display = 'none';
	jsUserBox.style.display = '';

	jsUserBox.querySelector('.name').innerHTML = accountId;

	jsUserChange.addEventListener('click', function() {
		logout();
	});

	const userAccount = await near.account(accountId);

	userAccount.getAccountBalance().then(data => {
		console.log(data);

		jsUserBox.querySelector('.wallet-val').innerHTML = parseFloat(nearApi.utils.format.formatNearAmount(data.total)).toFixed(2);
	});

	window.market = new nearApi.Contract(
		userAccount, marketName,
		{
			changeMethods: ["buy"],
			sender: userAccount
		}
	);
} else {
	document.querySelectorAll('.login-form-toggle').forEach(loginBtn => loginBtn.addEventListener('click', function() {
	  wallet.requestSignIn({
	    contractId: marketName,
	    methodNames: ['buy'],
	    successUrl: location.href,
	    failureUrl: location.href
	  });
	}));
}

if(typeof(jsItemDetailPage) != 'undefined') {
	let itemId = jsItemDetailPage.dataset.id;

	contract.nft_token({token_id: itemId}).then(data => {
		window.token = data;

		if(typeof(window.token.approved_account_ids[marketName]) == 'number')  {
			jsTokenPrice.innerHTML = window.token.approved_account_ids[marketName];
		} else {
			jsTokenPriceBox.style.display = 'none';
		}

		let properties = data.properties;

		if(properties != null) {
			if(properties.winrate != null) {
				jsWinRate.innerHTML = properties.winrate + '%';
			}

			if(jsBuyNow != null) {
				jsBuyNow.addEventListener('click', function() {
					if(wallet.isSignedIn()) {
						if(typeof(window.token.approved_account_ids[marketName]) == 'number')  {
							market.buy({token_id: this.dataset.id}, '300000000000000', window.token.approved_account_ids[marketName]).catch(e => {
								console.error(e);
							});
						} else {
							alert('Selected token not approved for buying');
						}
					} else {
						document.querySelector('.login-form-toggle').click();
					}
				});
			}
		}
	});
}