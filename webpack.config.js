let path              = require('path');
let webpack           = require('webpack');
let autoprefixer      = require('autoprefixer');
let ExtractTextPlugin = require("extract-text-webpack-plugin");
let UglifyJsPlugin    = require('uglifyjs-webpack-plugin');
let isProduction      = (process.env.NODE_ENV === 'production');


process.noDeprecation = true

module.exports = {
    entry: {
        app: [
        'babel-polyfill',
        './resources/assets/js/main.js',
        './resources/assets/scss/main.scss'
        ],
        vendor: ['jquery','vue']
    },
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: 'js/[name].js',
        publicPath: './public/'
    },
    devtool: 'source-map',
    module: {
        rules: [
        {
            test: require.resolve('jquery'),
            use: [{
              loader: 'expose-loader',
              options: 'jQuery'
          },{
              loader: 'expose-loader',
              options: '$'
          }]
      },
      {
        test: /\.(s[ac]ss)$/,
        exclude: [/node_modules/],
        use: ExtractTextPlugin.extract({
            use: [{
                loader: 'css-loader',
                options: {
                    url: false
                }
            }, 'postcss-loader', 'sass-loader'],
            fallback: "style-loader",
            publicPath: './public/css'
        })
    },
    {
        test: /\.js$/,
        exclude: [/node_modules/],
        use: {
            loader: 'babel-loader',
            query: {
                presets: ['es2015', 'vue']
            }
        }
    },
    {
        test: /\.vue$/,
        use: {
            loader: 'vue-loader',
            options: {
                url: false,
                postLoaders: {
                    html: 'babel-loader'
                },
            }
        }
    }
    ]
},
resolve: {
    alias: {
        vue: 'vue/dist/vue.min.js'
    }
},

plugins: [
new UglifyJsPlugin(),
new webpack.ProvidePlugin({
    Promise: 'es6-promise-promise',
}),
new webpack.ProvidePlugin({
   $:"jquery",

   jQuery:"jquery",

   "window.jQuery":"jquery"

}),
new webpack.DefinePlugin({
  'process.env': {
    NODE_ENV: '"production"'
}
}),
new webpack.optimize.CommonsChunkPlugin({
   names: ['vendor']
}),
new ExtractTextPlugin({
    filename: "css/style.css",
    disable: false,
    allChunks: true
}),
new webpack.LoaderOptionsPlugin({
    minimize: isProduction,
    options: {
        postcss: [
        autoprefixer({
            browsers: ['last 2 versions']
        })
        ]
    }
})
]
}