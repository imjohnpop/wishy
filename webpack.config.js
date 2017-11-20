var webpack = require("webpack");

module.exports = {
    entry: {
        checklist: './resources/assets/react/planner.js',
        vendor: ['react', 'react-dom'] // vendor bundle consisting of various modules
    },
    output: {
        path: __dirname + '/public/js',
        filename: '[name].bundle.js'
    },
    module: {
        loaders: [
            {
                test: /\.(js|jsx)$/,   // all files ending with .js
                loader: 'babel-loader',   // should be loaded with the babel loader
                exclude: /node_modules/,   // except those in /node_modules/
                query: {
                    presets: ['es2015', 'react']   // these presets should be used on them
                }
            }
        ]
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({ name: 'vendor', filename: 'vendor.bundle.js' })
    ]
}