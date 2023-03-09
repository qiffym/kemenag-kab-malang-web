<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
  $trail->push('Home', url('/'));
});

// Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
  $trail->push('Profile', url('#'));
});

// Berita
Breadcrumbs::for('berita', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Berita', url('/berita'));
});

// Read Berita
Breadcrumbs::for('read', function (BreadcrumbTrail $trail, $post) {
  $trail->parent('berita');
  $trail->push($post->title, url('/read', $post->slug));
});

// Read Artikel
Breadcrumbs::for('artikel', function (BreadcrumbTrail $trail, $post) {
  $trail->parent('home');
  $trail->parent('profile');
  $trail->push($post->title, url('/artikel/read', $post->slug));
});

// Berita Unit
Breadcrumbs::for('unit', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Unit Kerja', url('/unit'));
});

// Read Berita Unit
Breadcrumbs::for('unitread', function (BreadcrumbTrail $trail, $post) {
  $trail->parent('unit');
  $trail->push($post->title, url('/unit/read', $post->slug));
});

// Berita zi
Breadcrumbs::for('zi', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Zona Integritas', url('/zi'));
});

// Read Berita zi
Breadcrumbs::for('ziread', function (BreadcrumbTrail $trail, $post) {
  $trail->parent('zi');
  $trail->push($post->title, url('/zi/read', $post->slug));
});

// Pengumuman
Breadcrumbs::for('pengumuman', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Pengumuman', url('/pengumuman'));
});

Breadcrumbs::for('pengumumanread', function (BreadcrumbTrail $trail, $post) {
  $trail->parent('pengumuman');
  $trail->push($post->title, url('/pengumuman/read', $post->slug));
});

// Layanan
Breadcrumbs::for('layanan', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('Layanan', url('/layanan'));
});

// Read Layanan
Breadcrumbs::for('layananread', function (BreadcrumbTrail $trail, $post) {
  $trail->parent('layanan');
  $trail->push($post->title, url('/layanan/read', $post->slug));
});
