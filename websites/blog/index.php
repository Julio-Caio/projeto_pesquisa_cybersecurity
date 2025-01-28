<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prefeitura Municipal de Mulungu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #ffffff;
      min-height: 100vh;
    }
    header {
      border-bottom: 1px solid #ccc;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 16px;
    }
    .header-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 0;
    }
    .header-top img {
      height: 50px;
      width: auto;
    }
    .header-top button {
      background: none;
      border: none;
      cursor: pointer;
    }
    .header-links {
      display: none;
      align-items: center;
      gap: 16px;
    }
    .header-links a {
      text-decoration: none;
      color: #1d4ed8;
    }
    .header-links a:hover {
      color: #1e40af;
    }
    .header-search {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 0;
    }
    .header-search h1 {
      color: #1d4ed8;
      font-size: 24px;
      font-weight: 600;
    }
    .search-container {
      position: relative;
    }
    .search-container input[type="search"] {
      width: 256px;
      padding: 8px 32px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .search-icon {
      position: absolute;
      left: 8px;
      top: 50%;
      transform: translateY(-50%);
      color: #9ca3af;
    }
    main {
      padding: 32px 0;
    }
    nav ol {
      list-style: none;
      display: flex;
      gap: 8px;
      font-size: 14px;
    }
    nav ol li {
      color: #6b7280;
    }
    nav ol a {
      text-decoration: none;
      color: #1d4ed8;
    }
    section {
      margin-top: 32px;
    }
    section h2 {
      font-size: 28px;
      margin-bottom: 16px;
    }
    article {
      margin-bottom: 32px;
    }
    article h3 {
      font-size: 20px;
      margin-bottom: 8px;
    }
    article a {
      text-decoration: none;
      color: #1d4ed8;
    }
    article a:hover {
      color: #1e40af;
    }
    article p {
      font-size: 14px;
      color: #6b7280;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <div class="header-top">
        <div class="logo">
          <img src="logo.png" alt="Prefeitura Municipal de Mulungu">
        </div>
        <div class="header-links">
          <a href="/portal-da-transparencia">Portal da Transparência</a>
          <button aria-label="Acessibilidade">&#128065;</button>
          <button aria-label="Alto contraste">&#9728;</button>
        </div>
      </div>
      <div class="header-search">
        <h1>Prefeitura Municipal de Mulungu PB</h1>
        <div class="search-container">
          <input type="search" placeholder="O que você está procurando?">
          <span class="search-icon">&#128269;</span>
        </div>
      </div>
    </div>
  </header>

  <main class="container">
    <nav>
      <ol>
        <li><a href="/"><i class="fa fa-home" width="2em"></i></a></li>
        <li>/</li>
        <li>Lista de posts</li>
      </ol>
    </nav>

    <section>
      <h2>Blog</h2>
      <div>
        <article>
          <h3><a href="/diario-oficial-23-janeiro-2025">Diário Oficial – 23 de Janeiro de 2025</a></h3>
          <p>Categorizado como: <a href="/categoria/diario-oficial">Diário Oficial</a></p>
        </article>

        <article>
          <h3><a href="/diario-oficial-22-janeiro-2025">Diário Oficial – 22 de Janeiro de 2025</a></h3>
          <p>Clique aqui e faça o Download</p>
          <p>Categorizado como: <a href="/categoria/diario-oficial">Diário Oficial</a></p>
        </article>

		<article>
          <h3><a href="/diario-oficial-21-janeiro-2025">Diário Oficial – 21 de Janeiro de 2025</a></h3>
          <p>Categorizado como: <a href="/categoria/diario-oficial">Diário Oficial</a></p>
        </article>

		<article>
			<h3><a href="/diario-oficial-20-janeiro-2025">Diário Oficial – 20 de Janeiro de 2025</a></h3>
			<p>Categorizado como: <a href="/categoria/diario-oficial">Diário Oficial</a></p>
		</article>
      </div>
    </section>
  </main>

  <!--Footer-->
	<style>
	  footer {
		background-color: #22543D;
		color: white;
		padding: 40px 20px;
	  }
	  .container {
		max-width: 1200px;
		margin: 0 auto;
	  }
	  .flex {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		gap: 20px;
	  }
	  .logo img {
		max-width: 250px;
	  }
	  .links h3 {
		font-weight: bold;
		margin-bottom: 16px;
	  }
	  .links ul {
		list-style: none;
		padding: 0;
	  }
	  .links ul li {
		margin-bottom: 8px;
	  }
	  .links a {
		color: white;
		text-decoration: none;
	  }
	  .links a:hover {
		text-decoration: underline;
	  }
	  .address p {
		margin: 8px 0;
	  }
	  .copyright {
		border-top: 1px solid #1C4532;
		padding-top: 16px;
		text-align: center;
		font-size: 14px;
	  }
	</style>
	<footer>
	  <div class="container">
		<!-- Top Section -->
		<div class="flex">
		  <!-- Logo -->
		  <div class="logo">
			<img src="https://mulungu.pb.gov.br/wp-content/uploads/2023/11/Brasao_Mulungu-PB__1_-removebg-preview.png" alt="" class="wp-image-3641">
		  </div>
  
		  <!-- Links Grid -->
		  <div class="flex">
			<!-- Links Úteis -->
			<div class="links">
			  <h3>Links Úteis</h3>
			  <ul>
				<li><a href="http://cmmulungu.pb.gov.br/" target="_blank">Câmara</a></li>
				<li><a href="http://www.paraiba.pb.gov.br/" target="_blank">Governo do Estado</a></li>
				<li><a href="http://www.al.pb.leg.br/" target="_blank">Assembleia Legislativa</a></li>
				<li><a href="https://tjpb.jus.br/" target="_blank">TJPB</a></li>
				<li><a href="https://www.camara.leg.br/" target="_blank">Câmara dos Deputados</a></li>
				<li><a href="https://www.senado.leg.br/" target="_blank">Senado Federal</a></li>
				<li><a href="https://tce.pb.gov.br/" target="_blank">TCE-PB</a></li>
			  </ul>
			</div>
  
			<!-- LGPD & Serviços -->
			<div class="links">
			  <h3>LGPD & Serviços</h3>
			  <ul>
				<li><a href="/politica-de-privacidade">Política de Privacidade</a></li>
				<li><a href="/dados-abertos">Dados Abertos</a></li>
				<li><a href="/api-dados">API de Dados</a></li>
				<li><a href="/acervo-leis">Acervo de Leis</a></li>
				<li><a href="/glossario">Glossário</a></li>
				<li><a href="/mapa-do-site">Mapa do Site</a></li>
				<li><a href="/historia-do-municipio">História do Município</a></li>
				<li><a href="/hino-do-municipio">Hino do Município</a></li>
				<li><a href="/simbolos-do-municipio">Símbolos do Município</a></li>
			  </ul>
			</div>
		  </div>
		</div>
  
		<!-- Address Section -->
		<div class="address" style="text-align: center; margin: 40px 0;">
		  <p>Rua João Pessoa, 182, Centro</p>
		  <p>CEP: 58354-000</p>
		  <p>E-mail: esic@mulungu.pb.gov.br</p>
		  <p>CNPJ: 08.786.865/0001-37</p>
		</div>
  
		<!-- Copyright -->
		<div class="copyright">
		  <p>
			Todo o conteúdo deste site está publicado sob a licença
			<a href="https://creativecommons.org/licenses/by-nd/3.0/deed.pt_BR" target="_blank" rel="license" style="color: white; text-decoration: none;">Creative Commons Atribuição-SemDerivações 3.0 Não Adaptada</a>.
		  </p>
		</div>
	  </div>
	</footer>
  </body>
  </html>