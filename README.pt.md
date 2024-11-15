<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>

## Idiomas
- [Inglês](README.md)
- [Português Brasil](README.pt.md)

## Requisitos
- Composer
- PHP >= 8.1
- Sistema baseado em Debian (recomendado)

## Requisitos
- __Composer__
- __PHP >= 8.1__
- __Sistema baseado em Debian (recomendado)__

_Este projeto foi desenvolvido em um sistema operacional (SO) baseado em Debian (como Ubuntu ou Linux Mint), então alguns caminhos de arquivos e configurações podem ser diferentes se você estiver usando um SO diferente (por exemplo, macOS ou Windows) e ocasionar um **ERRO NA EXECUÇÃO**._

## Dica
Se você tiver várias versões do PHP instaladas, pode adicionar a versão que deseja usar, como php8.1 ... (certifique-se de cumprir o requisito de versão)

# Configurando o projeto
## 1. Instale as dependências
Após o download ou git clone, com o CLI (command line interface/linha de comando -> terminal) no diretório raiz execute `composer install`

## 2. Execute o projeto
### 1. Com php artisan
No diretório raiz execute `php artisan serve --port=8000`
(opcional) `--port=portNum`, este parâmetro permite executar o projeto em uma porta específica
(opcional) `--host=127.0.0.1`, este parâmetro permite definir o IP do host, útil em caso de uso do WSL ou se você deseja tornar sua aplicação acessível a partir de outras máquinas na sua rede

### 2. Com php CLI
Vá para o diretório `public/` e execute php(opcional: versão) -S hostNameOrIp:port
exemplo `php8.1 -S localhost:8000`

### 3. Com apache ou nginx
Adicione o diretório `public/` aos seus sites disponíveis e defina as configurações necessárias
