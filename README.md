# Blog + CRM — Laravel Practice Project

A single Laravel application combining a public **blog** (with comments) and a private **CRM** (customer & notes tracking), built as an independent practice project after completing Laravel's official "Getting Started" bootcamp.

**Live learning log:** this project was built step-by-step, error-by-error, with each real bug (route ordering conflicts, Eloquent casting, mass-assignment gotchas) documented and turned into a learning note. See [`02-chirper`](https://github.com/omereroglu1923/02-chirper) for the guided bootcamp project that came right before this one — this repo is the "now do it without the tutorial" step that followed it.

## Why this project exists

After finishing Laravel's official bootcamp (Chirper — a Twitter-like microblog), the goal here was to apply the same fundamentals **independently**, without following a course, while deliberately introducing a few patterns the bootcamp didn't cover:

- Two separate `belongsTo` relationships on a single model (`Comment` → `Post` + `User`, `Note` → `Customer` + `User`)
- Nested resource routes (`/blog/{post}/comments`, `/crm/customers/{customer}/notes`)
- Slug-based route model binding (`{post:slug}`)
- Search/filtering with query strings
- Two different authorization models side-by-side in the same app (author-only edit rights on the blog vs. shared-visibility/owner-only edit rights in the CRM)

## Features

### Blog (public)

- Anyone can read published posts
- Authenticated users can write, edit, and delete their own posts
- Comments on posts (authenticated users only), each user can delete their own comments
- Title-based search

### CRM (private, fully authenticated)

- All authenticated users can view all customers (shared visibility)
- Only the user who added a customer can edit or delete it
- Notes on customers, with the same double-`belongsTo` pattern as comments
- Name/email search

## Tech stack

- **Laravel 13** (PHP 8.5)
- **Blade** templates (no frontend framework yet — that comes later in the roadmap)
- **SQLite** for local development
- **Tailwind CSS 4**

## Getting started

```bash
git clone https://github.com/omereroglu1923/03-blog-crm.git
cd 03-blog-crm
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
composer run dev
```

Visit `http://localhost:8000/blog`.

## Project structure notes

- Authorization is handled entirely through Laravel **Policies** (`PostPolicy`, `CommentPolicy`, `CustomerPolicy`, `NotePolicy`) — no manual `if` checks scattered through controllers.
- Models never mass-assign foreign keys directly; ownership is always set through relationship methods (`$user->posts()->create(...)`) or `associate()` for the second side of a double `belongsTo`.

## Part of a larger roadmap

This project is the Phase 1 capstone of a self-directed full-stack roadmap (Laravel + DDD → React → React Native). Written notes from the learning process (in Turkish) are kept in a private Obsidian vault and will gradually be published as blog posts, cross-posted to dev.to/Hashnode with canonical links back to the original source.

## License

This is a personal learning project — feel free to look around, but it's not intended as a reusable package or template.
