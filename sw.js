if(!self.define){const e=e=>{"require"!==e&&(e+=".js");let i=Promise.resolve();return a[e]||(i=new Promise(async i=>{if("document"in self){const a=document.createElement("script");a.src=e,document.head.appendChild(a),a.onload=i}else importScripts(e),i()})),i.then(()=>{if(!a[e])throw new Error(`Module ${e} didn’t register its module`);return a[e]})},i=(i,a)=>{Promise.all(i.map(e)).then(e=>a(1===e.length?e[0]:e))},a={require:Promise.resolve(i)};self.define=(i,s,r)=>{a[i]||(a[i]=Promise.resolve().then(()=>{let a={};const c={uri:location.origin+i.slice(1)};return Promise.all(s.map(i=>{switch(i){case"exports":return a;case"module":return c;default:return e(i)}})).then(e=>{const i=r(...e);return a.default||(a.default=i),a})}))}}define("./sw.js",["./workbox-436ffff7"],(function(e){"use strict";self.addEventListener("message",e=>{e.data&&"SKIP_WAITING"===e.data.type&&self.skipWaiting()}),e.precacheAndRoute([{url:"404.php",revision:"1e29bd55c20fbfab4ffb489133ed3866"},{url:"alerts.php",revision:"a118f136621ce69da4ba36c89b084a09"},{url:"app.js",revision:"777374ae79092541599316b5c535c6a8"},{url:"buttons.php",revision:"84d1bac03f6fa2fac571fe7f360f9ccc"},{url:"change-password.php",revision:"67cfa5004d9148a72fa170a99cd71948"},{url:"css/bootstrap-select.min.css",revision:"3f38a7aabaa42fd36158f6ad666dae37"},{url:"css/chart.min.css",revision:"7d8693e997109f2aeac04066301679d6"},{url:"css/custom.css",revision:"a1ea74157863bfa0cff0f0dedd6acf8b"},{url:"css/dataTables.css",revision:"a3db4664b7dc463e3e780ec690f66efd"},{url:"css/ruang-admin.css",revision:"f090971077876af8760109ebbd03b8cd"},{url:"css/ruang-admin.min.css",revision:"ac3f0142a1f2e0e5e48b9917ceb3f077"},{url:"css/tempusdominus-bootstrap-4.min.css",revision:"d536cfd61807e16becccee8491b2fd49"},{url:"daily-sales.php",revision:"2decc8bce91f2c0f6a8bf6f7b4ddb604"},{url:"dashboard.php",revision:"5a492774c04c95d47ef89db55f081cf3"},{url:"db/dbConfig.php",revision:"37ce2d02211226f6f293ccc52a09c467"},{url:"documentation.php",revision:"1054f406e82100873a7c9b2dc378bd99"},{url:"dummy.txt",revision:"2a95b1fdcab19cff79f154bb40b0dda0"},{url:"edit-product.php",revision:"2b97ff8478f48e728fa0fd724d658197"},{url:"edit-sales.php",revision:"5883efc59286481dbe92fbf57a16fa60"},{url:"images/cover/cart.png",revision:"964d13a0395f4ffa4eac768c2727468f"},{url:"images/cover/empty.png",revision:"16909adfc3284718770abc3f426b92b3"},{url:"images/cover/great.png",revision:"45e114a2341d232889d839cae9584610"},{url:"images/favicon/android-chrome-192x192.png",revision:"54a06ca998696c25be556814c9635eeb"},{url:"images/favicon/android-chrome-512x512.png",revision:"8a982ca26f71719033a60271d524f9ac"},{url:"images/favicon/apple-touch-icon.png",revision:"7b75a5e8d4191eb670cf3427ff797ce3"},{url:"images/favicon/browserconfig.xml",revision:"a493ba0aa0b8ec8068d786d7248bb92c"},{url:"images/favicon/favicon-16x16.png",revision:"3102fa6ce0c96d18b1ef48ba47bc780f"},{url:"images/favicon/favicon-32x32.png",revision:"d7bc7a8846401da48e5a39f0b37c0707"},{url:"images/favicon/favicon.ico",revision:"65c2b612fef2beb948fc1de111ef9852"},{url:"images/favicon/mstile-150x150.png",revision:"c545a6611948c636567d1754ff59283b"},{url:"images/icons/icon-128x128.png",revision:"ec59947e01256396a8ea2c4c2ef51016"},{url:"images/icons/icon-144x144.png",revision:"50a5eeaf9a2cdaa72d2f009ecefa4ad9"},{url:"images/icons/icon-152x152.png",revision:"28804b7b42bd4eb10d6e0b3ddf48260b"},{url:"images/icons/icon-192x192.png",revision:"bb761382c3ab6ac2f74a98d540810276"},{url:"images/icons/icon-384x384.png",revision:"5b728138f74e74ff07d0f73bddaa7d93"},{url:"images/icons/icon-512x512.png",revision:"cda996c546eef269fbf780afd713da00"},{url:"images/icons/icon-72x72.png",revision:"c80a554aa36424be9f5c299eb15cb0c4"},{url:"images/icons/icon-96x96.png",revision:"ac9a750ace47a1aaa324d774aa9e335f"},{url:"images/logo/alpha-logo-vertical.png",revision:"801d7aa29624aa5f52c2f6a05fdf4d69"},{url:"images/logo/alpha.ai",revision:"2920d98c7b0d25dc75f7b41b0748f5bf"},{url:"images/logo/logo-horizontal-blue.png",revision:"ced906ead1b557d404bc1d637340901e"},{url:"images/logo/logo-horizontal-white.png",revision:"0c6e9287e9b8fa4dc246072011dcd066"},{url:"img/boy.png",revision:"d7fd9e0b952d5f9b9adff6ec29a8b20d"},{url:"img/error.svg",revision:"ad8144cda6b5d3c749577e5fe31e97d2"},{url:"img/girl.png",revision:"543cca41f0f6fd0b4ec44abccbfefb02"},{url:"img/innovation.svg",revision:"786a5e5fe39438b6193babce70d39081"},{url:"img/logo/logo.ai",revision:"727d0ab20bcb249e26a72e76e36b8a40"},{url:"img/logo/logo.png",revision:"60e67517145dc475fc658c4b436ab9ae"},{url:"img/logo/logo2.png",revision:"f04eb780bbade9bf97bfbc60291542cf"},{url:"img/man.png",revision:"6f2bab193b29900a280514754925b38e"},{url:"img/screenshot/ss1.png",revision:"8b299153f5d2921f1f00f119c5b27dc9"},{url:"img/think.svg",revision:"a0f3643b36bfe79fb3f6d93a48e61497"},{url:"img/undraw_posting_photo.svg",revision:"96a2c3f036f07f962f82d4d9e4b72ae0"},{url:"includes/head.php",revision:"a71cbe8fdcdbb04bcea02d3be4680d1e"},{url:"includes/scripts.php",revision:"3acdcd69ca612ea6deeddfccefd01694"},{url:"includes/sidebar.php",revision:"65a8d0d53aa82fbb0791c466ff7fcf8d"},{url:"includes/topbar.php",revision:"44ee976955b16b22b41e755bf4a5a9d4"},{url:"index.php",revision:"c452b96316cad83a3dedd40d1be877bb"},{url:"js/bootstrap-select.min.js",revision:"4e8e219e7ba4f36bf8bb2e8cf688f9c8"},{url:"js/chart.js",revision:"96dbcb165b51704f98589af316a56c59"},{url:"js/custom.js",revision:"155ec486b503de34cbe9e12c5a64c18a"},{url:"js/dataTables-demo.js",revision:"cf2bdea415780c215c596dfa5b85d15c"},{url:"js/dataTables.bootstrap4.js",revision:"f8004f5b2a2927fb7907cffbe9e6e232"},{url:"js/demo/chart-area-demo.js",revision:"34e681db7bf6356dd67d247033c9b5a0"},{url:"js/demo/chart-bar-demo.js",revision:"3fd013cf65cfa906fdb47511d63f8885"},{url:"js/demo/chart-pie-demo.js",revision:"ebf17d5ec23036352629b0d19eab27bb"},{url:"js/jquery.dataTables.js",revision:"e2274d1d820fdef9bba847b5853321bc"},{url:"js/ruang-admin.js",revision:"4acfd513d66cc900f7b56662bade438e"},{url:"js/ruang-admin.min.js",revision:"1a315ae6f230142d9e1291e790225540"},{url:"js/swal.js",revision:"f3b8ce97ff6ce324da6232da353adf40"},{url:"js/swal2.js",revision:"06a619e0249b91385b92d2b4b8a5392a"},{url:"js/tempusdominus-bootstrap-4.min.js",revision:"f9227b22d5acc4796e8a37dbc9d0786c"},{url:"login.php",revision:"87157f2905c4118a13a9b2bdf856bc7f"},{url:"logout.php",revision:"84673f60ef56b1a43d7e6f9c7ff25eef"},{url:"manifest.webmanifest",revision:"f0c91691ad77f64594b33d001ee4148b"},{url:"monthly-sales.php",revision:"67883c5286ca004933ca6794bc7e6bfe"},{url:"package.json",revision:"eb7140ea21541a2263ae3c4ae1a1b810"},{url:"point-of-sale.php",revision:"b7470acb28389eb71b59573226ced502"},{url:"products.php",revision:"d7d02996cbf27c31099e547f131fa4bd"},{url:"profit-loss.php",revision:"8a8363a96adc24917160753fb6a9555c"},{url:"restock.php",revision:"3b10d30266f7cb7513a4f845123e1c59"},{url:"sales.php",revision:"b1bebbfa16d8ba4fef41a96ea2ff15ba"},{url:"trash.php",revision:"772f6077e7f74e9899cb60c9ec96be3a"},{url:"vendor/bootstrap/css/bootstrap.css",revision:"1b606ce200cc3bf3e4cffdb84e296979"},{url:"vendor/bootstrap/css/bootstrap.min.css",revision:"454b67087795c1c849f146ba8c0d2aad"},{url:"vendor/bootstrap/js/bootstrap.bundle.js",revision:"a9247b1fe21ee409d0b37e74100de687"},{url:"vendor/bootstrap/js/bootstrap.bundle.min.js",revision:"a454220fc07088bf1fdd19313b6bfd50"},{url:"vendor/bootstrap/js/bootstrap.js",revision:"7f827fe484ec04346553202782b0664b"},{url:"vendor/bootstrap/js/bootstrap.min.js",revision:"e1d98d47689e00f8ecbc5d9f61bdb42e"},{url:"vendor/bootstrap/js/moment.min.js",revision:"8999b8b5d07e9c6077ac5ac6bc942968"},{url:"vendor/fontawesome-free/css/all.min.css",revision:"77cbad34e5ce95e70847b074e05faeab"},{url:"vendor/jquery-easing/jquery.easing.compatibility.js",revision:"ba0f90adf86e509dfabe178af9e726fc"},{url:"vendor/jquery-easing/jquery.easing.js",revision:"b55af8280cffdeaed8cc30b960f68878"},{url:"vendor/jquery-easing/jquery.easing.min.js",revision:"e2d41e5c8fed838d9014fea53d45ce75"},{url:"vendor/jquery/jquery.js",revision:"11c05eb286ed576526bf4543760785b9"},{url:"vendor/jquery/jquery.min.js",revision:"220afd743d9e9643852e31a135a9f3ae"},{url:"vendor/jquery/jquery.slim.js",revision:"1a94b73b4b451a7872de5d76f57024e4"},{url:"vendor/jquery/jquery.slim.min.js",revision:"d9b11ca4d877c327889805b73bb79edd"},{url:"yearly-sales.php",revision:"e3e61ddcf04d142d56ad6c7fde88b824"}],{})}));
//# sourceMappingURL=sw.js.map
