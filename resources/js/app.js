import './bootstrap';
import './admin/dashboard.js';
import '../css/app.css';

import { initAOS } from './plugins/aos-init';

// Inisialisasi AOS
initAOS();

const page = document.body.dataset.page;

if (page === 'showshop') {
  import('../css/user/shop.css');
  import('../css/user/navbar.css');
  import('./user/shop/showshop.js').then((module) => {
    module.showConfirmasi();
  });
}

if (page === 'indexshop') {
  import('../css/user/post.css');
  import('../css/user/navbar.css');
}
if (page === 'login') {
  import('../css/user/login.css');
}

if (page === 'post') {
  import('../css/user/post.css');
  import('../css/user/navbar.css');
}

if (page === 'postDetail') {
  import('../css/user/post.css');
  import('../css/user/navbar.css');
  import('./user/post/postDetail.js').then((module) => {
    module.initPostDetail();
  });
}

if (page === 'home') {
  import('../css/user/home.css');
  import('../css/user/navbar.css');
  import('./user/post/home.js');
}
