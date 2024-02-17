=== thirdweb WP ===
Contributors: warengonzaga
Donate link: https://github.com/sponsors/warengonzaga
Tags: thirdweb, nft, web3, blokchain, crypto, dapps, decentralization, decentralized, smart, contracts
Requires at least: 2.8.0
Tested up to: 6.4.0
Requires PHP: 7.2
Stable tag: 0.0.2
License: GPLv3
License URI: https://opensource.org/licenses/GPL-3.0

A community WordPress plugin for thirdweb. Turn your WordPress website into Web3 instantly and easily with thirdweb. 🚀💻🧩

== Description ==
A community WordPress plugin for [thirdweb](https://thirdweb.com). Turn your WordPress website into Web3 instantly and easily with thirdweb. 🚀💻🧩

== Setup ==
1. Go to your WordPress admin dashboard.
2. Go to __Settings > thirdweb WP__.
3. Save your thirdweb Engine URL and Access Token.
4. Click __Save Changes__.
5. You're all set! 🎉

*__Note__: You can also save your default or global address and chain across your wordpress site. Just go to __Settings > thirdweb WP__ and fill the __Default Contract Address__ and __Default Chain__ fields. Click __Save Changes__ to save your settings.*

== Usage ==
Reading contract address using `[twcontract]` shortcode.

`[twcontract address="0x00..." chain="84531" function="tokenURI:0"]`

*Shortcode Attributes*
- _address_ - The contract address.
- _chain_ - The chain name or ID.
- _function_ - The function name and arguments.

__Note__:
`functionName:arg1` for single argument.
`functionName:arg1,arg2` for multiple arguments.

_More features coming soon..._

== Frequently Asked Questions ==

= What is thirdweb? =
The full stack web3 development platform. Onboard users with wallets, build & deploy smart contracts, accept fiat with payments, and scale apps with infrastructure. [Learn more](https://thirdweb.com).

= What is thirdweb Engine? =
Production-grade HTTP server to interact with any smart contract on any EVM. Engine lets you create and interact with backend developer wallets, enabling high throughput with automatic nonce and gas management. [Learn more](https://thirdweb.com/engine).

= Is this an official WordPress plugin for thirdweb? =
This is an unofficial WordPress plugin however [the author of this project is part of the thirdweb team](https://thirdweb.com/about#:~:text=%40Sian_Morton-,Waren%20Gonzaga,-%40warengonzaga). This is just a community-contributed open source project and not part of the official product offered by thirdweb.

= Can I contribute? =
Yes of course! Visit the official [GitHub repository](https://github.com/warengonzaga/thirdweb-wp).

== Changelog ==
See the [release history](https://github.com/warengonzaga/thirdweb-wp/releases).
