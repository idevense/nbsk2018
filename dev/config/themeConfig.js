'use strict';

module.exports = {
	theme: {
		slug: 'nbsk2018',
		name: 'nbsk2018',
		author: 'Idar Evensen'
	},
	dev: {
		browserSync: {
			live: true,
			proxyURL: 'http://localhost/wordpress/',
			bypassPort: '8181'
		},
		browserslist: [ // See https://github.com/browserslist/browserslist
			'> 1%',
			'last 2 versions'
		],
		debug: {
			styles: true, // Render verbose CSS for debugging.
			scripts: false // Render verbose JS for debugging.
		}
	},
	export: {
		compress: true
	}
};
