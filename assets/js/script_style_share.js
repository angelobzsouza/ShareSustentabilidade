// Animação da navbar
$(window).on('load', function () {
	$('a.js-fh5co-nav-toggle').addClass('mt-2');
});

$(window).on('scroll', function () {
	if($(window).scrollTop()) {
		$('nav').addClass('nav-scroll');
		$('nav>div>div>div>ul>li>a').addClass('text-dark-nav');
		$('a.js-fh5co-nav-toggle').removeClass('fh5co-nav-white');
	}
	else {
		$('nav').removeClass('nav-scroll');
		$('nav>div>div>div>ul>li>a').removeClass('text-dark-nav');
		$('a.js-fh5co-nav-toggle').addClass('fh5co-nav-white');
	}
})

// Editor de texto Froala
$(function() {
	$("#texto").froalaEditor({
		charCounterCount: true,
		fileUpload: false,
		fullPage: false,	
		height: 450,
		placeholderText: "Insira o corpo da notícia",
		pluginsEnabled: ['align', 'fontSize'],
		wordPasteKeepFormatting: false
	});
});