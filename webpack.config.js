const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

module.exports = {
    context: path.resolve(__dirname, 'WebSrc'),
    entry : {
        // common : './js/common.js',
        grayscale : './js/grayscale.js',
        private : './js/private.js',
        // test : './js/test.js',
        error : './js/error.js',
        detail : './js/detail.js',
        modify : './js/modify.js',
        listing : './js/listing.js',
        login : './js/login.js',
        changePw : './js/changePw.js',
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
                test: /_component\.(php)$/,
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
            template: "assets/pages/index.php",
            chunks:  ['common', 'grayscale'],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "private.php",
            template: "assets/pages/private.php",
            chunks:  [ 'common', 'private' ],
            inject: 'body',
            link : "#logoutModal"
        }),
        new HtmlWebpackPlugin({
            filename : "listing.php",
            template: "assets/pages/listing.php",
            chunks:  [ 'common', 'listing' ],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "changeInfo.php",
            template: "assets/pages/changeInfo.php",
            chunks:  ['common', 'modify'],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "changePassword.php",
            template: "assets/pages/changePassword.php",
            chunks:  ['common', 'changePw'],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "login.php",
            template: "assets/pages/login.php",
            chunks:  ['common', 'login'],
            inject: 'body'
        }),
        new HtmlWebpackPlugin({
            filename : "error.php",
            template: "assets/pages/error.php",
            chunks:  ['common', 'error'],
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
            { from : '../WebSrc', to : 'WebSrc' },
            { from : '../rest', to : 'rest' },
            { from : '../config.php', to : '' },
            { from : '../.htaccess', to : '' },
            { context : './assets/components/', from : '*_card.php', to : 'components' },
            { from : 'img/default-account.png', to : 'img/profileImg'},
            { from : 'img/default-product.jpg', to : 'img/productImg'},
            { from : 'img/logo_ext.svg', to : 'img/logo_ext.svg'},
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
        }),
        // new BundleAnalyzerPlugin({openAnalyzer: true, analyzerPort: 8924})
    ],
    stats : true,
    optimization: {
        splitChunks: {
            minSize: 1,
            cacheGroups: {
                js: {
                    test: /\.js$/,
                    name: "common",
                    chunks: "all",
                    minChunks: 3,
                },
                css: {
                    test: /\.s?css$/,
                    name: "common",
                    chunks: "all",
                    minChunks: 5,
                },
            }
        }
    },
};