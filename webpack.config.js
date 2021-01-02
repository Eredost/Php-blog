const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'js/[name].js',
        path: path.resolve(__dirname, 'public'),
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
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'fonts/',
                        publicPath: 'fonts'
                    }
                }
            }
        ]
    },
    "plugins": [
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [ 'main.css', 'fonts/*', 'js/*' ]
        }),
        new MiniCssExtractPlugin({
            filename: '[name].css'
        })
    ]
};