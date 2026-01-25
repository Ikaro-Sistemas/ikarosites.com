# Guia de Configuração Docker

Este guia explica como rodar seu site WordPress localmente usando Docker.

## Pré-requisitos

1.  **Docker Desktop** instalado e rodando.
2.  Um terminal (PowerShell, CMD, ou Git Bash).

## Passo 1: Preparar os arquivos

Os arquivos de configuração (`docker-compose.yml`, `Dockerfile`, `.dockerignore`) já foram criados na pasta do projeto.

### Alteração no `wp-config.php`
Eu modifiquei seu `wp-config.php` para ser "inteligente". Ele agora tenta ler as configurações do banco de dados das variáveis de ambiente do Docker. Se não as encontrar, ele usa suas configurações antigas. Isso significa que o arquivo funciona tanto no Docker quanto no seu ambiente atual.

## Passo 2: Extrair o Banco de Dados

Você possui backups na pasta `arquivos antes das API`. Vamos usar o arquivo `.sql` de um deles.

1.  Abra a pasta `arquivos antes das API`.
2.  Abra um dos arquivos `.tar` (ex: `2026-01-07...FILE-DBDUMP-WPPLUGIN.tar`) com o 7-Zip ou WinRAR.
3.  Extraia o arquivo `ikaror83_wp381.sql` para a pasta raiz do projeto (`c:\Users\ikaro\OneDrive\Desktop\Ikarosites.com`).
4.  Renomeie este arquivo para `db_dump.sql` (para facilitar o comando depois).

## Passo 3: Iniciar o Ambiente

No terminal, dentro da pasta do projeto (`c:\Users\ikaro\OneDrive\Desktop\Ikarosites.com`), execute:

```powershell
docker-compose up -d --build
```

- `up`: Sobe os containers.
- `-d`: Roda em segundo plano (detached).
- `--build`: Garante que a imagem do WordPress seja construída.

Aguarde até que o processo termine.

## Passo 4: Importar o Banco de Dados

Agora precisamos colocar os dados do seu site dentro do banco de dados do Docker.

Certifique-se de que o arquivo `db_dump.sql` está na pasta raiz (onde você está rodando o comando).

Execute este comando para importar (PowerShell):

```powershell
Get-Content db_dump.sql | docker-compose exec -T db mysql -u ikaror83_wp381 -p"Lyp442.-5S" ikaror83_wp381
```

*Ou no CMD/Git Bash:*
```bash
docker-compose exec -T db mysql -u ikaror83_wp381 -p"Lyp442.-5S" ikaror83_wp381 < db_dump.sql
```

## Passo 5: Acessar o Site

Acesse seu navegador em: **http://localhost:8000**

### Problemas Comuns
- **Redirecionamento infinito ou links quebrados:** Seu banco de dados provavelmente está configurado para o domínio original (`https://ikarosites.com`). Você precisará atualizar as URLs no banco de dados para `http://localhost:8000`.
- Você pode fazer isso rodando consultas SQL ou usando um plugin como "Better Search Replace" se conseguir acessar o painel admin (`http://localhost:8000/wp-admin`).
- Ou, adicione estas linhas temporárias ao seu `wp-config.php` (logo após `<?php`):
  ```php
  define('WP_HOME','http://localhost:8000');
  define('WP_SITEURL','http://localhost:8000');
  ```

## Comandos Úteis

- **Parar o servidor:** `docker-compose down`
- **Ver logs:** `docker-compose logs -f`
