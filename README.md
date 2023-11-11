# thirdweb WP (WordPress Plugin)

[![by](https://img.shields.io/badge/by-Waren%20Gonzaga-blue.svg?labelColor=181717&style=flat-square)](https://github.com/warengonzaga) [![sponsors](https://img.shields.io/badge/sponsor-%E2%9D%A4-%23db61a2.svg?&logo=github&logoColor=white&labelColor=181717&style=flat-square)](https://github.com/sponsors/warengonzaga) [![release](https://img.shields.io/github/release/warengonzaga/thirdweb-wp.svg?logo=github&labelColor=181717&color=green&style=flat-square)](https://github.com/warengonzaga/thirdweb-wp/releases) [![star](https://img.shields.io/github/stars/warengonzaga/thirdweb-wp.svg?&logo=github&labelColor=181717&color=yellow&style=flat-square)](https://github.com/warengonzaga/thirdweb-wp/stargazers) [![license](https://img.shields.io/github/license/warengonzaga/thirdweb-wp.svg?&logo=github&labelColor=181717&style=flat-square)](https://github.com/warengonzaga/thirdweb-wp/blob/main/license)

---

A community WordPress plugin for **[thirdweb](https://thirdweb.com)**. Turn your WordPress website into Web3 instantly and easily with thirdweb. 💻🌏

Have suggestions in mind? [Let me know!](https://github.com/warengonzaga/thirdweb-wp/issues)

## ⚡ Features

- Contract Reading Shortcode
- Contract Writing Shortcode _(Coming Soon)_
- Gutenberg Blocks _(Coming Soon)_

## 📋 Requirements

- [thirdweb Engine URL](https://portal.thirdweb.com/engine/getting-started)
- [thirdweb Engine Access Token](https://thirdweb.com/dashboard/engine)
- WordPress 5.0+
- PHP 8.1+

## 📦 Installation

To be able to start using this plugin just [download the latest release here](https://github.com/warengonzaga/thirdweb-wp/releases/latest).

- Upload the plugin (.zip file) to the /wp-content/plugins/ directory.
- Activate the Update Your Footer WP plugin through the 'Plugins' menu in WordPress.
- See the usage section below to start using the plugin.

## 🛠️ Setup

1. Go to your WordPress admin dashboard.
2. Go to `Settings > thirdweb WP`.
3. Save your thirdweb Engine URL and Access Token.
4. Click `Save Changes`.
5. You're all set! 🎉

> [!NOTE]
> You can also save your default or global address and chain across your wordpress site. Just go to `Settings > thirdweb WP` and fill the `Default Contract Address` and `Default Chain` fields. Click `Save Changes` to save your settings.

## 🕹️ Usage

Reading contract address using `[twcontract]` shortcode.

```php
[twcontract address="0x00..." chain="84531" function="tokenURI:0"]
```

- `address` - The contract address.
- `chain` - The chain name or ID.
- `function` - The function name and arguments.

> [!NOTE]
> `functionName:arg1` for single argument or `functionName:arg1,arg2` for multiple arguments.

_More features coming soon..._

## 🎯 Contributing

Contributions are welcome, create a pull request to this repo and I will review your code. Please consider to submit your pull request to the `dev` branch. Thank you!

Read the project's [contributing guide](./contributing.md) for more info.

## 🐛 Issues

Please report any issues and bugs by [creating a new issue here](https://github.com/warengonzaga/thirdweb-wp/issues/new/choose), also make sure you're reporting an issue that doesn't exist. Any help to improve the project would be appreciated. Thanks! 🙏✨

## 🙏 Sponsor and Support

> Love what I do? Send me some [love](https://github.com/sponsors/warengonzaga) or [coffee](https://buymeacoff.ee/warengonzaga)!? 💖☕
>
> Can't send love or coffees? 😥 Nominate me for a **[GitHub Star](https://stars.github.com/nominate)** instead!
> Your support will help me to continue working on open-source projects like this. 🙏😇

## 📋 Code of Conduct

Read the project's [code of conduct](./code_of_conduct.md).

## 📃 License

This project is licensed under [GNU General Public License v3.0](https://opensource.org/licenses/GPL-3.0).

## 📝 Author

This project is created by **[Waren Gonzaga](https://github.com/warengonzaga)**, with the help of awesome [contributors](https://github.com/warengonzaga/thirdweb-wp/graphs/contributors).

---

💻 with ❤️ by [Waren Gonzaga](https://warengonzaga.com) and [Him](https://www.youtube.com/watch?v=HHrxS4diLew&t=44s) 🙏
