/* Cufon */
Cufon.replace("#hMenu, #menu ul li a, .sagBaslik h2, .solBaslik h2", {textShadow: "1px 1px #fff", hover: true});

$(function(){

	/* Css Fix */
	$(".oneCikanlar ul li:last").css("border-color","#f2eaea");
	$(".herGun ul li:eq(4), .herGun ul li:eq(9), .herGun ul li:eq(14)").css("margin-right",0);
	
	/* Abone Ol */
	$(".aboneOl ul li").hover(function(){
		var indis = $(this).index();
		$(".aboneOl ul li:not(:eq("+indis+"))").fadeTo("fast", 0.5);
	}, function(){
		$(".aboneOl ul li").fadeTo("fast", 1);
	});
	
	/* Slider */
	var toplam = $("#slider ul li").length;
	var genislik = 599;
	var tGenislik = toplam*genislik;
	var yDeger;
	$("#slider ul").css("width",tGenislik+"px");
	var deger = 0;
	$("a#Sonraki").click(function(){
		if (deger < toplam-1){
			deger++;
			yDeger = deger*genislik;
			$("#slider ul").animate({marginLeft: "-"+yDeger+"px"}, 400);
		}
		return false
	});
	$("a#Onceki").click(function(){
		if (deger > 0){
			deger--;
			yDeger = deger*genislik;
			$("#slider ul").animate({marginLeft: "-"+yDeger+"px"}, 400);
		}
		return false
	});

});