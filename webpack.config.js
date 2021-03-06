const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = {
    entry: "./src/index.js",
    output: {
        filename: "js/[name].js",
        path: path.resolve(__dirname, "public"),
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
                            url: (url) => !url.includes("uploads/")
                        }
                    },
                    "postcss-loader",
                    "sass-loader"
                ]
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                use: {
                    loader: "file-loader",
                    options: {
                        name: "[name].[ext]",
                        outputPath: "fonts/",
                        publicPath: "fonts"
                    }
                }
            }
        ]
    },
    "plugins": [
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [ "main.css", "fonts/*", "js/*" ]
        }),
        new MiniCssExtractPlugin(),
        new BrowserSyncPlugin({
            files: ["src/scss/*.scss", "App/views/*", "App/views/*/*"],
            startPath: "/blog-php/public",
            host: "localhost",
            port: 3001,
            proxy: "http://localhost:8080/"
        }, {
            reload: true
        })
    ],
    devServer: {
        proxy: {
            "/": "http://localhost:80/"
        },
        publicPath: "/blog-php/public",
        stats: "errors-only",
        host: process.env.HOST,
        port: process.env.PORT,
        open: false,
    }
};
