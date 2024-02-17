=== thirdweb WP ===
Contributors: warengonzaga
Donate link: https://github.com/sponsors/warengonzaga
Tags: thirdweb, nft, web3, blokchain, crypto
Requires at least: 2.8.0
Tested up to: 6.4.0
Requires PHP: 7.2
Stable tag: 0.0.2
License: GPLv3
License URI: https://opensource.org/licenses/GPL-3.0

A community WordPress plugin for [thirdweb](https://thirdweb.com). Turn your WordPress website into Web3 instantly and easily with thirdweb. 💻🌏

== Description ==
Community contributed WordPress plugin for thirdweb features. Turn your WordPress website into Web3 instantly and easily with thirdweb.

== Setup ==
1. Go to your WordPress admin dashboard.
2. Go to `Settings > thirdweb WP`.
3. Save your thirdweb Engine URL and Access Token.
4. Click `Save Changes`.
5. You're all set! 🎉

> Note:
> You can also save your default or global address and chain across your wordpress site. Just go to `Settings > thirdweb WP` and fill the `Default Contract Address` and `Default Chain` fields. Click `Save Changes` to save your settings.

== Usage ==
Reading contract address using `[twcontract]` shortcode.

```text
[twcontract address="0x00..." chain="84531" function="tokenURI:0"]
```

- `address` - The contract address.
- `chain` - The chain name or ID.
- `function` - The function name and arguments.
  > Note:
  > `functionName:arg1` for single argument.
  > `functionName:arg1,arg2` for multiple arguments.

_More features coming soon..._

== Frequently Asked Questions ==

= Can I contribute? =
Yes of course! Visit the official [GitHub repository](https://github.com/warengonzaga/thirdweb-wp).

== Changelog ==
See the [release history](https://github.com/warengonzaga/thirdweb-wp/releases).
