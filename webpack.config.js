const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'js/[name].js',
        path: path.resolve(__dirname, 'public/assets'),
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: "css-loader",
                        options: {
                            url: (url, sourcePath) => {
                                if (url.includes('images/')) {

                                    return false;
                                }

                                return true;
                            }
                        }
                    },
                    'postcss-loader',
                    'sass-loader'
                ]
            }
        ]
    },
    "plugins": [
        new MiniCssExtractPlugin({
            filename: 'css/[name].css'
        })
    ]
};