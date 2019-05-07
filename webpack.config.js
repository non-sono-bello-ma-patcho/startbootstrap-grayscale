const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

module.exports = {
    context: path.resolve(__dirname, 'WebSrc'),
    entry : {
        common : './js/common.js',
        grayscale : './js/grayscale.js',
        private : './js/private.js',
        // test : './js/test.js',
        error : './js/error.js',
        fontawesome : './js/fontawesome.js',
        detail : './js/detail.js'
  },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: "js/[name].js"
    },
    mode: "development",
    module: {
        rules: [
            {
                test: /\.js$/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        cacheDirectory: true,
                        presets: [["@babel/preset-env", {modules: false}]],
                        plugins: ["@babel/plugin-syntax-dynamic-import"],
                    }
                }
            },
        // compilazione dei scss, immagini e font:
            // sta rumenta compila i require sulle pagine
            {
                test: /_component\.(html)$/,
                use:
                    {

                        loader: 'html-loader',
                        options: {
                            attrs: [':data-src']
                        }
                    }
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            importLoaders: 2,
                            sourceMap: false
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            plugins: () => [
                                require('autoprefixer')(),
                            ],
                            sourceMap: false
                        }
                    },
                    /*{
                        loader: "resolve-url-loader"
                    },*/
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            },
            {
                test: /\.less$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            importLoaders: 2,
                            sourceMap: false
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            plugins: () => [
                                require('autoprefixer')(),
                            ],
                            sourceMap: false
                        }
                    },
                    /*{
                        loader: "resolve-url-loader"
                    },*/
                    {
                        loader: 'less-loader',
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            },
            {
                // immagini utilizzate nei css
                test: /_css\.(png|jpg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name : '[name].[ext]',
                            outputPath : 'img',
                            publicPath : '../img',
                            // context : 'dist',
                            useRelativePath : true
                        }
                    }
                ]
            },
            // immagini utilizzate direttamente nelle pagine
            {
                test: /_ext\.(png|jpg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath : 'img',
                            publicPath : 'img',
                        }
                    }
                ]
            },
            {
                test: /\.svg$/,
                loader: 'svg-inline-loader'
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        name: 'fonts/[name].[ext]'
                    }
                }
            },
        ]
    },
    plugins: [
        new CleanWebpackPlugin(),
        new HtmlWebpackPlugin({
            title: "Herschel | Planet is your playground",
            filename : "index.php",
            template: "assets/index.php",
            chunks:  ['common', 'grayscale'],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "private.php",
            template: "assets/pages/private.php",
            chunks:  ['common', 'private'],
            inject: 'body'
        }),
        /*new HtmlWebpackPlugin({
            filename : "detail.php",
            template: "assets/pages/detail.php",
            chunks:  [],
            inject: 'body'
        }),*/
        new HtmlWebpackPlugin({
            filename : "modifyform.php",
            template: "assets/pages/modifyform.php",
            chunks:  ['common'],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "error.php",
            template: "assets/pages/error.php",
            chunks:  ['error'],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "components/admin_panel.php",
            template: "assets/components/admin_panel.php",
            chunks : []
        }),
        new HtmlWebpackPlugin({
            filename : "detail.php",
            template: "assets/pages/detail.php",
            chunks : [ 'common', 'detail' ],
            links : [
                {
                    name : "HOME",
                    link : "index.php"
                },
                {
                    name : "DESCRIPTION",
                    link : "#description"
                },
                {
                    name : "FEATURES",
                    link : "#features"
                },
                {
                    name : "BUY",
                    link : "#buy"
                },
                {
                    name : "Log In",
                    link : "#loginModal"
                },
            ],
        }),
        new CopyWebpackPlugin([
            { from : '../php', to : 'php' },
            { from : '../config.php', to : '' },
            { context : './assets/components/', from : '*_card.php', to : 'components' }
        ]),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            'window.$': 'jquery',
            Popper: ['popper.js', 'default'],
            // In case you imported plugins individually, you must also require them here:
            Alert: "exports-loader?Alert!bootstrap/js/dist/alert",
            Button: "exports-loader?Button!bootstrap/js/dist/button",
            Carousel: "exports-loader?Carousel!bootstrap/js/dist/carousel",
            Collapse: "exports-loader?Collapse!bootstrap/js/dist/collapse",
            Dropdown: "exports-loader?Dropdown!bootstrap/js/dist/dropdown",
            Modal: "exports-loader?Modal!bootstrap/js/dist/modal",
            Popover: "exports-loader?Popover!bootstrap/js/dist/popover",
            Scrollspy: "exports-loader?Scrollspy!bootstrap/js/dist/scrollspy",
            Tab: "exports-loader?Tab!bootstrap/js/dist/tab",
            Tooltip: "exports-loader?Tooltip!bootstrap/js/dist/tooltip",
            // common: "common"
        }),
        new MiniCssExtractPlugin({
            filename : 'css/[name].css'
        })
    ],
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: true,
                parallel: true,
                sourceMap: true
            }),
            new OptimizeCSSAssetsPlugin({
                cssProcessorOptions: {
                    parser: require("postcss-safe-parser")
                }
            })
        ]
    },
    stats : true
};