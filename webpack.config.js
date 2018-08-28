const path = require('path');

module.exports = {
    entry: './app/js/main.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, './dist')
    },
    resolve: {
        alias: {
            $: "jquery/src/jquery",
        }
    },
module: {
        rules: [{
            test: /\.js$/,
            include: [path.resolve(__dirname, "./src/app")],
            exclude: /node_modules/,
        }]
    },
};