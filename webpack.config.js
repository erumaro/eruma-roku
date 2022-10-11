const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = [
    {
        entry: {
            'bundle': [
                './src/index.js',
                './src/sass/style.scss'
            ]
        },
        output: {
            filename: './dist/[name].min.[fullhash].js',
            path: path.resolve(__dirname)
        },
        module: {
            rules: [
                {
                    test: /\.(js|jsx)$/,
                    exclude: /node_modules/,
                    loader: 'babel-loader'
                },
                {
                    test: /\.(sass|scss)$/,
                    use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
                },
            ]
        },
        plugins: [
            new CleanWebpackPlugin({
                cleanOnceBeforeBuildPatterns: [
                    './dist/*',
                    './dist/*'
                ]
            }),
            new MiniCssExtractPlugin({
                filename: './dist/eruma-roku.min.[fullhash].css'
            }),
        ],
        optimization: {
            minimizer: [
                `...`,
                new CssMinimizerPlugin(),
            ]
        },
    }
];