const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MakeDirWebpackPlugin = require('make-dir-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
    context: path.resolve(__dirname, 'WebSrc'),
    entry : {
        common : './js/common.js',
        grayscale : './js/grayscale.js',
        // private : './js/private.js',
        // test : './js/test.js',
        // fontawesomecustom : './js/fontawesomecustom.js'
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
            {
                test: /_component\.(html)$/,
                use: {
                    loader: 'php-loader',
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
            // immagini utilizzate in index
            {
                test: /_index\.(png|jpg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath : 'img',
                            publicPath : 'img',
                            useRelativePath : true
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
    stats : true
};