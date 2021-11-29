<?include($_SERVER['DOCUMENT_ROOT'] . '/template/header.html');?>
<link rel="stylesheet" href="/local/css/light-theme.css">
<div class="container">
	<div class="media-wrap">
		<div class="img-box">
			<video src="/local/others/trailer.mp4" autoplay="" muted="" loop="" playsinline=""></video>
		</div>
	</div>

	<section class="catalog">
		
		<button class="filter-toggle">Filter</button>

		<form id="jsMainFilter" class="catalog-filter" action="">
			<label class="search">
				<input id="jsSearchField" type="text" placeholder="Search by serial number">
			</label>

			<template id="tmplFilterItem">
				<details>
					<summary>#rname#</summary>
					<ul>
						#list#
					</ul>
				</details>
			</template>

			<template id="tmplFilterItemCheckbox">
				<li>
					<label>
						<input type="checkbox" name="#code#" value="#value#">
						<span class="checkbox"></span>
						<span>#name#</span>
					</label>
				</li>
			</template>

			<template id="tmplFilterSlider">
				<details>
					<summary>#rname#</summary>
					<ul>
						<li>
							<div class="slider-wrap">
								<div class="slider" data-values="#values#" data-name="#name#"></div>
							</div>
						</li>
					</ul>
				</details>
			</template>
		</form>

		<div class="catalog-inner">
			<form class="catalog-sorting" action="">
				<ul class="sorting">
					<li>Fighters</li>
					<li>Weapons</li>
					<li>Items</li>
					<li>Boosters</li>
					<li>Land</li>
					<li>Merchandise</li>
				</ul>

				<div class="serial-number" id="jsSortToogler">
					Serial number
				</div>
			</form>

			<div class="cards-wrap" id="jsNftList">

			</div>
			<template id="tmplNftPreview">
				<div class="card-preview" data-index="#id#" style="--order:#order#">
					<div class="img-box">
						<picture>
							<img src="#img#" alt="Image is here">
						</picture>
					</div>
					<a href="#url#"></a>
				</div>
			</template>
		</div>
	</section>
</div>
<?include($_SERVER['DOCUMENT_ROOT'] . '/template/footer.html');?>