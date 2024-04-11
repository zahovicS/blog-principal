<?php

use yii\helpers\Url;

?>
<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.html">
			<img src="<?= Url::base() ?>/theme/deskapp/images/deskapp-logo.svg" alt="" class="dark-logo" />
			<img src="<?= Url::base() ?>/theme/deskapp/images/deskapp-logo-white.svg" alt="" class="light-logo" />
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li>
					<a href="<?= Url::to("/admin/dashboard/index") ?>" class="dropdown-toggle no-arrow">
						<span class="micon icon-copy dw dw-analytics-4"></span><span class="mtext">Dashboard</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon icon-copy dw dw-coding"></span><span class="mtext">Posts</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= Url::to("/admin/post/index") ?>">Ver posts</a></li>
						<li><a href="<?= Url::to("/admin/post/new") ?>">Crear post</a></li>
						<!-- <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon fa fa-plug"></span><span class="mtext">Level 2</span>
							</a>
							<ul class="submenu child">
								<li><a href="javascript:;">Level 2</a></li>
								<li><a href="javascript:;">Level 2</a></li>
							</ul>
						</li> -->
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon icon-copy icon-copy dw dw-price-tag"></span><span class="mtext">Categorias</span>
					</a>
					<ul class="submenu">
						<li><a href="<?= Url::to("/admin/category/index") ?>">Ver categorias</a></li>
						<li><a href="<?= Url::to("/admin/category/new") ?>">Crear categoría</a></li>
					</ul>
				</li>
				<li>
					<div class="dropdown-divider"></div>
				</li>
				<li>
					<a href="<?= Url::to("/admin/perfil/index") ?>" class="dropdown-toggle no-arrow">
						<span class="micon icon-copy dw dw-user1"></span><span class="mtext">Mi perfil</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>