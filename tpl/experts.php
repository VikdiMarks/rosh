<html lang="ru">

<head>
	<meta charset="utf-8">
	<title>{{header}}</title>
	<link rel="icon" href="/favicon.svg" type="image/svg+xml">
	<meta name="robots" content="noindex,nofollow" wb-if="'{{_route.hostname}}'=='www.dev.medcenterrosh.ru'">
</head>

<body class="body" data-barba="wrapper">
	<div class="scroll-container" data-scroll-container>
		<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
		<main class="page" data-barba="container" data-barba-namespace="{{_route.name}}">
			<wb-module wb="module=yonger&mode=render" />
		</main>
		<wb-module wb="module=yonger&mode=render&view=footer" />
	</div>
	<div class="to_top_btn">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="29px" viewBox="0 0 20 29" enable-background="new 0 0 20 29" xml:space="preserve">
			<path fill="#FFF" d="M11.011,0.4c-0.534-0.533-1.397-0.533-1.929,0L0.4,9.082c-0.533,0.533-0.533,1.396,0,1.929 c0.532,0.533,1.396,0.533,1.929,0l7.717-7.717l7.717,7.717c0.533,0.533,1.397,0.533,1.93,0c0.533-0.532,0.533-1.396,0-1.929 L11.011,0.4z" />
			<rect x="8.682" y="1.364" fill="#FFF" width="2.729" height="27.284" />
		</svg>
	</div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />

</html>