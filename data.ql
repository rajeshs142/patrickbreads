/*****************************************************************************************************
******************************************************************************************************
***********************************************NAV DATA***********************************************
***********************************************NAV DATA***********************************************
***********************************************NAV DATA***********************************************
******************************************************************************************************
*****************************************************************************************************/
insert into nav(title,link) values
("Breads","/category/breads"),
("Sweets","/category/sweets"),
("Pastries","/category/pastries"),
("Saviouries","/category/saviouries"),
("Cakes","/category/Cakes"),
("Gluten Free Range","/category/gluten-free-range"),
("Catering Range","/category/catering-range"),
("Packaged Products","/category/packaged-products"),
("New Products","/category/new-products");

insert into nav(title,link,parent_id) values
("Bread Loaves","/category/bread-loaves",1),
("Bread Rolls","/category/bread-rolls",1),
("Turkish Bread","/category/turkish-bread",1),
("Sourdough Breads","/category/sourdough-breads",1),
("Bagels and Scones","/category/bagels-and-scones",1),
("Wraps","/category/wraps",1);

insert into nav(title,link,parent_id) values
("Banana Breads","/category/banana-breads",2),
("Muffins","/category/muffins",2),
("Friands","/category/friands",2),
("Donuts","/category/donuts",2);

insert into nav(title,link,parent_id) values
("Croissants","/category/croissants",3),
("Danish Pastries","/category/danish-pastries",3),
("Scrolls","/category/scrolls",3);

insert into nav(title,link,parent_id) values
("Pies","/category/pies",4),
("Quiches","/category/quiches",4),
("Triangle Filos","/category/triangle-filos",4);

insert into nav(title,link,parent_id) values
("Cake Slices","/category/cake-slices",5),
("Single Serves","/category/single-serves",5),
("Sweet Tarts","/category/sweet-tarts",5),
("Large Cakes","/category/large-cakes",5),
("Cookies","/category/cookies",5),
("Italian Specialities","/category/italian-specialities",5);

insert into nav(title,link,parent_id) values
("Italian Breads","/category/italian-breads",8),
("Polish Breads","/category/polish-breads",8),
("Bread Rolls Bagged","/category/bread-rolls-bagged",8);

/*****************************************************************************************************
******************************************************************************************************
***********************************************CATEGORY DATA******************************************
***********************************************CATEGORY DATA******************************************
***********************************************CATEGORY DATA******************************************
******************************************************************************************************
*****************************************************************************************************/
insert into category(name,thumb_img,url,hero_img) values
("Breads","/img/parallax1.jpg","/category/breads","/img/parallax1.jpg"),
("Sweets","/img/parallax1.jpg","/category/sweets","/img/parallax1.jpg"),
("Pastries","/img/parallax1.jpg","/category/pastries","/img/parallax1.jpg"),
("Saviouries","/img/parallax1.jpg","/category/saviouries","/img/parallax1.jpg"),
("Cakes","/img/parallax1.jpg","/category/Cakes","/img/parallax1.jpg"),
("Gluten Free Range","/img/parallax1.jpg","/category/gluten-free-range","/img/parallax1.jpg"),
("Catering Range","/img/parallax1.jpg","/category/catering-range","/img/parallax1.jpg"),
("Packaged Products","/img/parallax1.jpg","/category/packaged-products","/img/parallax1.jpg"),
("New Products","/img/parallax1.jpg","/category/new-products","/img/parallax1.jpg");


insert into category(name,thumb_img,url,category_slug,hero_img,parent_id) values
("Bread Loaves","/img/parallax1.jpg","/category/bread-loaves","Bread Loaves","/img/parallax1.jpg",1),
("Bread Rolls","/img/parallax1.jpg","/category/bread-rolls","Bread Rolls","/img/parallax1.jpg",1),
("Turkish Bread","/img/parallax1.jpg","/category/turkish-bread","Turkish Bread","/img/parallax1.jpg",1),
("Sourdough Breads","/img/parallax1.jpg","/category/sourdough-breads","Sourdough Breads","/img/parallax1.jpg",1),
("Bagels and Scones","/img/parallax1.jpg","/category/bagels-and-scones","Bagels and scones","/img/parallax1.jpg",1),
("Wraps","/img/parallax1.jpg","/category/wraps","Wraps","/img/parallax1.jpg",1);

insert into category(name,thumb_img,url,category_slug,hero_img,parent_id) values
("Banana Breads","/img/parallax1.jpg","/category/banana-breads","banana-breads","/img/parallax1.jpg",2),
("Muffins","/img/parallax1.jpg","/category/muffins","muffins","/img/parallax1.jpg",2),
("Friands","/img/parallax1.jpg","/category/friands","friands","/img/parallax1.jpg",2),
("Donuts","/img/parallax1.jpg","/category/donuts","donuts","/img/parallax1.jpg",2);

insert into category(name,thumb_img,url,category_slug,hero_img,parent_id) values
("Croissants","/img/parallax1.jpg","/category/croissants","croissants","/img/parallax1.jpg",3),
("Danish Pastries","/img/parallax1.jpg","/category/danish-pastries","danish-pastries","/img/parallax1.jpg",3),
("Scrolls","/img/parallax1.jpg","/category/scrolls","scrolls","/img/parallax1.jpg",3);

insert into category(name,thumb_img,url,category_slug,hero_img,parent_id) values
("Pies","/img/parallax1.jpg","/category/pies","pies","/img/parallax1.jpg",4),
("Quiches","/img/parallax1.jpg","/category/quiches","quiches","/img/parallax1.jpg",4),
("Triangle Filos","/img/parallax1.jpg","/category/triangle-filos","triangle-filos","/img/parallax1.jpg",4);

insert into category(name,thumb_img,url,category_slug,hero_img,parent_id) values
("Cake Slices","/img/parallax1.jpg","/category/cake-slices","cake-slices","/img/parallax1.jpg",5),
("Single Serves","/img/parallax1.jpg","/category/single-serves","single-serves","/img/parallax1.jpg",5),
("Sweet Tarts","/img/parallax1.jpg","/category/sweet-tarts","sweet-tarts","/img/parallax1.jpg",5),
("Large Cakes","/img/parallax1.jpg","/category/large-cakes","large-cakes","/img/parallax1.jpg",5),
("Cookies","/img/parallax1.jpg","/category/cookies","cookies","/img/parallax1.jpg",5),
("Italian Specialities","/img/parallax1.jpg","/category/italian-specialities","italian-specialities","/img/parallax1.jpg",5);

insert into category(name,thumb_img,url,category_slug,hero_img,parent_id) values
("Italian Breads","/img/parallax1.jpg","/category/italian-breads","italian-breads","/img/parallax1.jpg",8),
("Polish Breads","/img/parallax1.jpg","/category/polish-breads","polish-breads","/img/parallax1.jpg",8),
("Bread Rolls Bagged","/img/parallax1.jpg","/category/bread-rolls-bagged","bread-rolls-bagged","/img/parallax1.jpg",8);








update product set product_slug = replace(name,' ','-');

update product set product_slug = lower(product_slug);

update product set product_slug = replace(product_slug,'&','and');

update product set product_slug = replace(product_slug,'.', '-point-');

update product set product_slug = replace(product_slug,'(-', '-');

update product set product_slug = replace(product_slug,'(', '-');

update product set product_slug = replace(product_slug,')', '-');

update product set product_slug = replace(product_slug,'/', '-or-');


magick convert http://www.zastavki.com/pictures/1680x1050/2011/Food_Bread_rolls_croissants_Donuts_and_muffins_031171_.jpg -fill black -colorize 50% public/img/c_sweets_tp.png