if(!self.define){const e=e=>{"require"!==e&&(e+=".js");let a=Promise.resolve();return r[e]||(a=new Promise(async a=>{if("document"in self){const r=document.createElement("script");r.src=e,document.head.appendChild(r),r.onload=a}else importScripts(e),a()})),a.then(()=>{if(!r[e])throw new Error(`Module ${e} didn’t register its module`);return r[e]})},a=(a,r)=>{Promise.all(a.map(e)).then(e=>r(1===e.length?e[0]:e))},r={require:Promise.resolve(a)};self.define=(a,i,s)=>{r[a]||(r[a]=Promise.resolve().then(()=>{let r={};const o={uri:location.origin+a.slice(1)};return Promise.all(i.map(a=>{switch(a){case"exports":return r;case"module":return o;default:return e(a)}})).then(e=>{const a=s(...e);return r.default||(r.default=a),r})}))}}define("./sw.js",["./workbox-ffe48540"],(function(e){"use strict";self.addEventListener("message",e=>{e.data&&"SKIP_WAITING"===e.data.type&&self.skipWaiting()}),e.precacheAndRoute([{url:"404.php",revision:"ffe132cab413cff21c1264dfc50831da"},{url:"app.js",revision:"148e5f7db45c582f368d5640005be8fc"},{url:"change-password.php",revision:"afe134cb93e52039f769b9a538cb96cf"},{url:"css/bootstrap-select.min.css",revision:"3f38a7aabaa42fd36158f6ad666dae37"},{url:"css/chart.min.css",revision:"7d8693e997109f2aeac04066301679d6"},{url:"css/custom.css",revision:"a1ea74157863bfa0cff0f0dedd6acf8b"},{url:"css/dataTables.css",revision:"a3db4664b7dc463e3e780ec690f66efd"},{url:"css/ruang-admin.css",revision:"6bb8ac61ca5ef2a515b3c8a8eba5b4a7"},{url:"css/ruang-admin.min.css",revision:"ac3f0142a1f2e0e5e48b9917ceb3f077"},{url:"css/tempusdominus-bootstrap-4.min.css",revision:"d536cfd61807e16becccee8491b2fd49"},{url:"daily-sales.php",revision:"8a1da98634acb2d5e5caf1213341f091"},{url:"dashboard.php",revision:"e52f9cf810ad6fc7491a12e459c1c5d9"},{url:"db/alpha_schema.sql",revision:"e9bcec6201438add2c42311343b16678"},{url:"db/dbConfig.php",revision:"900d79f4701c11b091173dfbf956454a"},{url:"documentation.php",revision:"1054f406e82100873a7c9b2dc378bd99"},{url:"dummy.txt",revision:"c95e44799bd5f4bddb0d7a62c7e5d0f0"},{url:"edit-product.php",revision:"2b97ff8478f48e728fa0fd724d658197"},{url:"edit-sales.php",revision:"0e42d59e37d3781221bad4a0d0ecde8c"},{url:"images/cover/cart.png",revision:"964d13a0395f4ffa4eac768c2727468f"},{url:"images/cover/empty.png",revision:"16909adfc3284718770abc3f426b92b3"},{url:"images/cover/great.png",revision:"45e114a2341d232889d839cae9584610"},{url:"images/favicon/android-chrome-192x192.png",revision:"54a06ca998696c25be556814c9635eeb"},{url:"images/favicon/android-chrome-512x512.png",revision:"8a982ca26f71719033a60271d524f9ac"},{url:"images/favicon/apple-touch-icon.png",revision:"7b75a5e8d4191eb670cf3427ff797ce3"},{url:"images/favicon/browserconfig.xml",revision:"68c9044fa4a08749efb85bb2a4edaede"},{url:"images/favicon/favicon-16x16.png",revision:"3102fa6ce0c96d18b1ef48ba47bc780f"},{url:"images/favicon/favicon-32x32.png",revision:"d7bc7a8846401da48e5a39f0b37c0707"},{url:"images/favicon/favicon.ico",revision:"65c2b612fef2beb948fc1de111ef9852"},{url:"images/favicon/mstile-150x150.png",revision:"c545a6611948c636567d1754ff59283b"},{url:"images/icons/icon-128x128.png",revision:"ec59947e01256396a8ea2c4c2ef51016"},{url:"images/icons/icon-144x144.png",revision:"50a5eeaf9a2cdaa72d2f009ecefa4ad9"},{url:"images/icons/icon-152x152.png",revision:"28804b7b42bd4eb10d6e0b3ddf48260b"},{url:"images/icons/icon-192x192.png",revision:"bb761382c3ab6ac2f74a98d540810276"},{url:"images/icons/icon-384x384.png",revision:"5b728138f74e74ff07d0f73bddaa7d93"},{url:"images/icons/icon-512x512.png",revision:"cda996c546eef269fbf780afd713da00"},{url:"images/icons/icon-72x72.png",revision:"c80a554aa36424be9f5c299eb15cb0c4"},{url:"images/icons/icon-96x96.png",revision:"ac9a750ace47a1aaa324d774aa9e335f"},{url:"images/logo/alpha-logo-vertical.png",revision:"801d7aa29624aa5f52c2f6a05fdf4d69"},{url:"images/logo/alpha.ai",revision:"2920d98c7b0d25dc75f7b41b0748f5bf"},{url:"images/logo/logo-horizontal-blue.png",revision:"ced906ead1b557d404bc1d637340901e"},{url:"images/logo/logo-horizontal-white.png",revision:"0c6e9287e9b8fa4dc246072011dcd066"},{url:"includes/base_url.php",revision:"8d7af6dad3eb56b03866f08092759ed8"},{url:"includes/head.php",revision:"93087312c9b0e67937073678c0d3d1bb"},{url:"includes/scripts.php",revision:"ef494879b0eb06e4ef2948276f756380"},{url:"includes/sidebar.php",revision:"68dbadcad7bf19d7f3f9b4485957035d"},{url:"includes/topbar.php",revision:"1196c7936a7903d03a1927350908d88d"},{url:"index.php",revision:"eddfd2d95e9ac6c4bce9f51a8599bf91"},{url:"js/bootstrap-select.min.js",revision:"4e8e219e7ba4f36bf8bb2e8cf688f9c8"},{url:"js/chart.js",revision:"96dbcb165b51704f98589af316a56c59"},{url:"js/custom.js",revision:"155ec486b503de34cbe9e12c5a64c18a"},{url:"js/dataTables-demo.js",revision:"a517b95a6e62fa8b3759d0baeb748ce7"},{url:"js/dataTables.bootstrap4.js",revision:"232a6ef11e1e974c41ad032ee0b42548"},{url:"js/demo/chart-area-demo.js",revision:"620d08b1b4086efadd01b43770889ca0"},{url:"js/demo/chart-bar-demo.js",revision:"9f6b0d6ed19726de38def6ebacfb4489"},{url:"js/demo/chart-pie-demo.js",revision:"fe0f6abeec8332366854f5e48647d50b"},{url:"js/jquery.dataTables.js",revision:"8cd20ddb83594933b51c2c5666e6f085"},{url:"js/ruang-admin.js",revision:"35f74c6f58395aff6ea6967fbfde3008"},{url:"js/ruang-admin.min.js",revision:"1a315ae6f230142d9e1291e790225540"},{url:"js/swal.js",revision:"f3b8ce97ff6ce324da6232da353adf40"},{url:"js/swal2.js",revision:"06a619e0249b91385b92d2b4b8a5392a"},{url:"js/tempusdominus-bootstrap-4.min.js",revision:"f9227b22d5acc4796e8a37dbc9d0786c"},{url:"login.php",revision:"7715b3493ae8d217d7f13fa5354bc021"},{url:"logout.php",revision:"84673f60ef56b1a43d7e6f9c7ff25eef"},{url:"manifest.webmanifest",revision:"2b2d6184e7474c8f247b07a81a18a477"},{url:"monthly-sales.php",revision:"2055abb6e6d846ac5aa00b09e3022a88"},{url:"package.json",revision:"8ee05bd23de677a891e50540270577e0"},{url:"point-of-sale.php",revision:"c7e01e2bac1f3c1813e587bf7878ecf9"},{url:"products.php",revision:"a894d0f4d728535dd847d66d1cfd7b14"},{url:"profit-loss.php",revision:"8d1693fdc96f562eb8da5223e4a24483"},{url:"README.md",revision:"8113cec40c239a779fe4864ba8917334"},{url:"restock.php",revision:"00f6b807df9bb2d3b264a200c803dd69"},{url:"sales.php",revision:"b1bebbfa16d8ba4fef41a96ea2ff15ba"},{url:"trash.php",revision:"b75e630b1b67e90afc9f52bd7c8bb592"},{url:"vendorr/bootstrap/css/bootstrap.css",revision:"ba8798db487d071391a5928a146869c0"},{url:"vendorr/bootstrap/css/bootstrap.min.css",revision:"1b3dec37e57c6109189db1767aa85453"},{url:"vendorr/bootstrap/js/bootstrap.bundle.js",revision:"a9247b1fe21ee409d0b37e74100de687"},{url:"vendorr/bootstrap/js/bootstrap.bundle.min.js",revision:"5997c3664427ce6bdf536095b293e9c7"},{url:"vendorr/bootstrap/js/bootstrap.js",revision:"7f827fe484ec04346553202782b0664b"},{url:"vendorr/bootstrap/js/bootstrap.min.js",revision:"9075742ee1fe2d0c1d47a431fda233e4"},{url:"vendorr/bootstrap/js/moment.min.js",revision:"5c7c4e9266d3bd90e9bdba4ee1f4b5d8"},{url:"vendorr/fontawesome-free/css/all.min.css",revision:"d20765f01142b249d1f06e1b38899de4"},{url:"vendorr/jquery-easing/jquery.easing.compatibility.js",revision:"ba0f90adf86e509dfabe178af9e726fc"},{url:"vendorr/jquery-easing/jquery.easing.js",revision:"b55af8280cffdeaed8cc30b960f68878"},{url:"vendorr/jquery-easing/jquery.easing.min.js",revision:"06d6c9d87db183e0d58b86b2f94db54b"},{url:"vendorr/jquery/jquery.js",revision:"11c05eb286ed576526bf4543760785b9"},{url:"vendorr/jquery/jquery.min.js",revision:"220afd743d9e9643852e31a135a9f3ae"},{url:"vendorr/jquery/jquery.slim.js",revision:"1a94b73b4b451a7872de5d76f57024e4"},{url:"vendorr/jquery/jquery.slim.min.js",revision:"d9b11ca4d877c327889805b73bb79edd"},{url:"yearly-sales.php",revision:"1568e8976daf384f050a15fbc5bd2246"}],{})}));
//# sourceMappingURL=sw.js.map
