# Hrithik Features

[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active)


Add site URL here.

Plugin for Hrithik. All backend functionality will take place in this plugin. Like, registering post type, taxonomy, widget and meta box.

## Notes

- Rename plugin's folder to hrithik-features when you use this skeleton. For example, rtcamp-features.
- Replace hrithik word by your project name. For example, rtcamp-mu. It will replace in @packages, text-domain. Also rename main plugin's filename.
- Replace Hrithik word by your project name. For example, rtCamp_MU. It will replace in namespace, messages.
- Replace hrithik word by your project name. It will replace in functions name, action, filter, cache key and etc.
- Replace HRITHIK word by your project name. For example, RTCAMP_MU. It will repalce in constant.

## Plugin Structure

```markdown
.
├── assets
│   ├── build
│   │   ├── js
│   │   │   ├── blocks.js
│   ├── js
│   │   ├── blocks
│   │   │   ├── example-block
│   │   │   |		├── index.js
│   │   ├── blocks.js
│   ├── .babelrc
│   ├── .eslintignore
│   ├── .eslintrc.json
│   ├── package.json
│   ├── package-lock.json
│   ├── webpack.config.js
├── inc
│   ├── classes
│   │   ├── class-assets.php
│   │   ├── class-cache.php
│   │   ├── class-meta-boxes.php
│   │   ├── class-plugin-configs.php
│   │   ├── class-plugin.php
│   │   ├── class-post-types.php
│   │   ├── class-rewrite.php
│   │   ├── class-seo.php
│   │   ├── class-taxonomies.php
│   │   ├── class-widgets.php
│   │   ├── class-blocks.php
│   │   ├── meta-boxes
│   │   │   ├── class-base.php
│   │   │   └── class-metabox-example.php
│   │   ├── plugin-configs
│   │   │   └── class-fieldmanager.php
│   │   ├── post-types
│   │   │   ├── class-base.php
│   │   │   └── class-post-type-example.php
│   │   ├── taxonomies
│   │   │   ├── class-base.php
│   │   │   └── class-taxonomy-example.php
│   │   └── widgets
│   │   └── blocks
│   ├── helpers
│   │   ├── autoloader.php
│   │   └── custom-functions.php
│   └── traits
│       └── trait-singleton.php
└── hrithik-features.php
```

## Post types

| Label                                     | Slug               | Public | Taxonomies                       |
|-------------------------------------------|--------------------|--------|----------------------------------|
| Post (Default)                            | post               | Yes    | Category, Tag                    |
| Page (Default)                            | page               | Yes    | N/A                              |
| Media (Default)                           | attachment         | Yes    | N/A                              |

## Taxonomies

| Label              | Slug               | Public |
|--------------------|--------------------|--------|
| Category (Default) | category           | No     |
| Tag (Default)      | post_tag           | Yes    |

## Meta Boxes

Registered meta boxes.

```markdown
- Add custom meta boxes details here.
```

## Gutenberg Blocks.
| Label                                     | Type               |
|-------------------------------------------|--------------------|
| Example Block                             | Static             |
| Example Dynamic Block                     | Dynamic            |


## Assets

Assets folder contains webpack setup and can be used for creating blocks or adding any other custom scripts like javascript for admin.

- Run `npm i` from `assets` folder to install required npm packages.
- Use `npm run dev` during development for assets.
- Use `npm run prod` for production.
- Use `npm run eslint:fix js/fileName.js` for fixing and linting eslint errors and warning.
