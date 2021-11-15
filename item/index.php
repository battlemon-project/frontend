<?include($_SERVER['DOCUMENT_ROOT'] . '/template/header.html');?>
<?$item_id = (int) $_REQUEST['id'];?>
		<div class="container">
			<section class="card" id="jsItemDetailPage" data-id="<?=$item_id;?>">
				<div class="preview">
					<div class="img-box">
						<picture class="lazy">
							<source data-srcset="/local/img/fighters-23.webp" srcset="" type="image/webp">
							<img data-src="/local/img/fighters-23.png" src="" alt="Image is here">
						</picture>
					</div>

					<div class="btns-wrap">
						<button class="btn inventory-toggle" data-modal="inventory">Inventory</button>
						<button class="btn inventory-toggle" data-modal="resourses">NFT resources</button>
					</div>
				</div>

				<div class="chars">
					<ul class="chars-list">
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Lemon gem</p>
								<p>Jobs</p>
								<p>5% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Cenruty</p>
								<p>Our time</p>
								<p>17% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>EYES</p>
								<p>Close</p>
								<p>29% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Accessory</p>
								<p>Cigar</p>
								<p>7% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Type</p>
								<p>Heavy</p>
								<p>33% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Syber suit</p>
								<p>Gold</p>
								<p>0.7% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Background</p>
								<p>Green</p>
								<p>20% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Expressions</p>
								<p>Calm</p>
								<p>55% feature</p>
								<p>In stock</p>
							</div>
						</li>
						<li class="token">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/token.webp" srcset="" type="image/webp">
									<img data-src="/local/img/token.png" src="" alt="Image is here">
								</picture>
							</div>
							<div class="token-text">
								<p>Top</p>
								<p>Elvis Presley</p>
								<p>0.5% feature</p>
								<p>In stock</p>
							</div>
						</li>
					</ul>

					<div class="near-value">20
						<span>
							<svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.42765 38.0705C5.05414 38.0705 5.67326 37.9359 6.2428 37.6759C6.81233 37.4159 7.31888 37.0365 7.72791 36.5637L37.5415 2.10778C37.1502 1.48385 36.606 0.969438 35.96 0.613021C35.314 0.256604 34.5876 0.0699198 33.8492 0.0705583C33.2262 0.0706607 32.6105 0.203793 32.0435 0.460984C31.4765 0.718175 30.9714 1.09345 30.5622 1.56153L0.597656 35.8143C0.973895 36.4984 1.52808 37.0688 2.20201 37.4659C2.87593 37.8629 3.64473 38.0717 4.42765 38.0705V38.0705Z" fill="url(#paint0_linear_3532:765)"/>
							<path d="M4.41392 38.0704C5.10617 38.0703 5.78836 37.9047 6.40365 37.5875V8.82365L29.4807 36.5161C29.8888 37.0038 30.3991 37.3959 30.9755 37.6645C31.552 37.9331 32.1804 38.0716 32.8163 38.0704H33.7267C34.8787 38.0704 35.9835 37.6128 36.7981 36.7982C37.6127 35.9836 38.0703 34.8788 38.0703 33.7268V4.41407C38.0703 3.26207 37.6127 2.15726 36.7981 1.34268C35.9835 0.528092 34.8787 0.0704636 33.7267 0.0704636C33.0348 0.0679257 32.3524 0.231739 31.737 0.548101V29.3252L8.6599 1.63268C8.25257 1.14353 7.74259 0.750001 7.16614 0.480017C6.58969 0.210034 5.96089 0.0702087 5.32434 0.0704636H4.41392C3.26193 0.0704636 2.15711 0.528092 1.34253 1.34268C0.527942 2.15726 0.0703125 3.26207 0.0703125 4.41407V33.7268C0.0703125 34.8788 0.527942 35.9836 1.34253 36.7982C2.15711 37.6128 3.26193 38.0704 4.41392 38.0704V38.0704Z" fill="#4CC551"/>
							<defs>
							<linearGradient id="paint0_linear_3532:765" x1="1.34194" y1="36.796" x2="36.7951" y2="1.20852" gradientUnits="userSpaceOnUse">
							<stop offset="0.21" stop-color="#4CC551"/>
							<stop offset="0.42" stop-color="#4CC551" stop-opacity="0"/>
							<stop offset="0.59" stop-color="#4CC551" stop-opacity="0"/>
							<stop offset="0.81" stop-color="#4CC551"/>
							</linearGradient>
							</defs>
							</svg>
						</span>
					</div>

					<div class="btns-wrap">
						<button class="btn" id="jsBuyNow" data-id="<?=$item_id;?>">buy now</button>
						<button class="btn">make offer</button>
						<button class="btn">RENT</button>
					</div>

					<div class="inventory-wrap" data-modal="inventory">
						<h2>Inventory</h2>

						<div class="inventory-close">
							<span class="line"></span>
							<span class="line"></span>
						</div>					

						<div class="items">
							<div class="item">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/wp-01.webp" srcset="" type="image/webp">
										<img data-src="/local/img/wp-01.png" src="" alt="Image is here">
									</picture>
								</div>
							</div>
							<div class="item">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/wp-02.webp" srcset="" type="image/webp">
										<img data-src="/local/img/wp-02.png" src="" alt="Image is here">
									</picture>
								</div>
							</div>
							<div class="item">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/wp-03.webp" srcset="" type="image/webp">
										<img data-src="/local/img/wp-03.png" src="" alt="Image is here">
									</picture>
								</div>
							</div>
							<div class="item"></div>
							<div class="item"></div>
							<div class="item"></div>
						</div>
					</div>
					
					<div class="inventory-wrap" data-modal="resourses">
						<h2>NFT resourcesy</h2>

						<div class="inventory-close">
							<span class="line"></span>
							<span class="line"></span>
						</div>

						<div class="inventory">
							<div class="card-preview">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/fighters-23.webp" srcset="" type="image/webp">
										<img data-src="/local/img/fighters-23.png" src="" alt="Image is here">
									</picture>
								</div>
								<a href="#"></a>
							</div>
							<div class="card-preview">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/fighters-23.webp" srcset="" type="image/webp">
										<img data-src="/local/img/fighters-23.png" src="" alt="Image is here">
									</picture>
								</div>
								<a href="#"></a>
							</div>
							<div class="card-preview">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/fighters-23.webp" srcset="" type="image/webp">
										<img data-src="/local/img/fighters-23.png" src="" alt="Image is here">
									</picture>
								</div>
								<a href="#"></a>
							</div>
							<div class="card-preview">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/fighters-23.webp" srcset="" type="image/webp">
										<img data-src="/local/img/fighters-23.png" src="" alt="Image is here">
									</picture>
								</div>
								<a href="#"></a>
							</div>
							<div class="card-preview">
								<div class="img-box">
									<picture class="lazy">
										<source data-srcset="/local/img/fighters-23.webp" srcset="" type="image/webp">
										<img data-src="/local/img/fighters-23.png" src="" alt="Image is here">
									</picture>
								</div>
								<a href="#"></a>
							</div>
						</div>
					</div>
				</div>

				<div class="info">
					<p>0027JMXBTL23051645</p>

					<div class="values">
						<div class="value-wrap">
							<p>Win Rate</p>
							<p id="jsWinRate"></p>
						</div>
						<div class="value-wrap">
							<p>Sowing</p>
							<p>2/5</p>
						</div>
					</div>
				</div>

				<div class="history">
					<div class="tabs">
						<div class="tabs-header">
							<button class="tab active">Trading history</button>
							<button class="tab">Offer history</button>
						</div>
						<div class="tabs-body">
							<div class="tab-content active">
								<table>
									<thead>
										<tr>
											<th>
												<span>Event</span>
											</th>
											<th>
												<span>Price</span>
											</th>
											<th>
												<span>From</span>
											</th>
											<th>
												<span>To</span>
											</th>
											<th>
												<span>Dateк</span>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<span>List</span>
											</td>
											<td>
												<span>22</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>a day ago</span>
											</td>
										</tr>
										<tr>
											<td>
												<span>List</span>
											</td>
											<td>
												<span>22</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>a day ago</span>
											</td>
										</tr>
										<tr>
											<td>
												<span>List</span>
											</td>
											<td>
												<span>22</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>a day ago</span>
											</td>
										</tr>										
									</tbody>
								</table>
							</div>
							<div class="tab-content">
								<table>
									<thead>
										<tr>
											<th>
												<span>Price</span>
											</th>
											<th>
												<span>From</span>
											</th>
											<th>
												<span>Floor difference</span>
											</th>
											<th>
												<span>Expiration</span>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<span>22</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>19% below</span>
											</td>
											<td>
												<span>1 day</span>
											</td>
										</tr>
										<tr>
											<td>
												<span>20</span>
											</td>
											<td>
												<span>near876</span>
											</td>
											<td>
												<span>21% below</span>
											</td>
											<td>
												<span>1 day</span>
											</td>
										</tr>
										<tr>
											<td>
												<span>17</span>
											</td>
											<td>
												<span>trackOon</span>
											</td>
											<td>
												<span>23.3% below</span>
											</td>
											<td>
												<span>2 days</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="more-for-collection">
				<h2>More from this collection</h2>

				<ul class="collection-list">
					<li>
						<div class="card-preview">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/fighters-23.webp" srcset="" type="image/webp">
									<img data-src="/local/img/fighters-23.png" src="" alt="Image is here">
								</picture>
							</div>
							<a href="#"></a>
						</div>
					</li>
					<li>
						<div class="card-preview">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/fighters-24.webp" srcset="" type="image/webp">
									<img data-src="/local/img/fighters-24.png" src="" alt="Image is here">
								</picture>
							</div>
							<a href="#"></a>
						</div>
					</li>
					<li>
						<div class="card-preview">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/fighters-25.webp" srcset="" type="image/webp">
									<img data-src="/local/img/fighters-25.png" src="" alt="Image is here">
								</picture>
							</div>
							<a href="#"></a>
						</div>
					</li>
					<li>
						<div class="card-preview">
							<div class="img-box">
								<picture class="lazy">
									<source data-srcset="/local/img/fighters-26.webp" srcset="" type="image/webp">
									<img data-src="/local/img/fighters-26.png" src="" alt="Image is here">
								</picture>
							</div>
							<a href="#"></a>
						</div>
					</li>
				</ul>
			</section>
		</div>
<?include($_SERVER['DOCUMENT_ROOT'] . '/template/footer.html');?>