# 🚀 Ikarosites.com - Plataforma de Desenvolvimento e Estudo

Bem-vindo ao repositório do **Ikarosites.com**. Este projeto é um laboratório vivo de desenvolvimento web, focado em WordPress, alta performance e design responsivo.

## 🎯 Objetivo do Projeto

Este repositório documenta minha jornada de aprendizado prático ("Learning by Doing"). O objetivo é transformar um site padrão em uma plataforma robusta, aplicando conceitos de:

*   **Clean Code & Organização:** Manutenção de uma estrutura de arquivos limpa e versionada.
*   **Alta Performance:** Otimização de servidor (PHP), carregamento de assets e banco de dados.
*   **Design Moderno:** Utilização do Elementor Pro para interfaces avançadas e responsivas.
*   **DevOps Básico:** Fluxo de versionamento (Git) e Deploy em ambiente de hospedagem (HostGator).

## 🛠️ Tecnologias e Ferramentas

- **CMS:** WordPress (Core)
- **Linguagens:** PHP 7.4+, HTML5, CSS3, JavaScript
- **Design & Builder:** Elementor Pro
- **Infraestrutura:** Apache/Nginx, MySQL
- **Versionamento:** Git & GitHub
- **Gestão de Projetos:** Jira (Organização de tarefas e backlog)
- **Business Intelligence:** Power BI (Visualização de gráficos e métricas do projeto)

## 📂 Estrutura do Projeto

A estrutura segue o padrão do WordPress, com foco na pasta `wp-content`:

```text
ikarosites.com/
├── wp-content/
│   ├── themes/       # Temas (Astra + Child Theme)
│   ├── plugins/      # Plugins (Elementor, Site Kit, etc.)
│   └── uploads/      # Mídia e arquivos do site
├── wp-config.php     # Configurações globais (Não versionado por segurança)
└── php.ini           # Configurações de performance do servidor
```

## ⚙️ Configurações de Performance (php.ini)

Para garantir que o Elementor e o backend funcionem sem gargalos, foram aplicadas as seguintes configurações de servidor:

- `memory_limit`: **512M** (Previne erros fatais de memória)
- `max_execution_time`: **180s** (Permite processos longos de importação)
- `upload_max_filesize`: **256M** (Permite upload de mídias de alta qualidade)

## 🚀 Como fazer o Deploy (HostGator)

O fluxo de trabalho atual consiste em:

1.  Desenvolvimento local/ambiente de teste.
2.  Commit das alterações no Git.
3.  Upload para o servidor HostGator via FTP ou Git Version Control (cPanel).

## 🔄 Integração Jira + GitHub (Smart Commits)

Para manter o rastreamento automático das tarefas e atualizar o quadro Kanban via código, utilizamos **Smart Commits**. Exemplo de sintaxe nas mensagens de commit:

*   **Vincular código à tarefa:** `PROJ-123 Atualizando o header` (Substitua PROJ-123 pela chave da tarefa)
*   **Adicionar comentário:** `PROJ-123 #comment Ajuste de CSS finalizado`
*   **Mover para Concluído:** `PROJ-123 #done #comment Tarefa finalizada e testada`

## 🐳 Configuração com Docker

Para rodar o projeto localmente de forma isolada e rápida, utilizamos Docker.

1.  **Configuração Inicial:** Siga o guia detalhado em `INSTRUCOES_DOCKER.md`.
2.  **Iniciar Ambiente:** Execute `docker-compose up -d`.
3.  **Acessar:** O site estará disponível em `http://localhost:8000`.

## 🧪 Testes

Atualmente, os testes são manuais. Após iniciar o ambiente Docker ou subir alterações:


## 📝 Próximos Passos

- [ ] Refinar o design da Home com Elementor Pro.
- [ ] Implementar otimização de imagens (WebP).
- [ ] Configurar cache de servidor e CDN.
- [x] Criar um tema filho (Child Theme) para customizações de código seguras.
- [ ] Novo dominio
- [ ] woocomerce
- [ ] maps

---

*Desenvolvido por Ikaro - Estudante de Engenharia de Software e Desenvolvimento Web.*
