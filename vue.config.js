module.exports = {
    publicPath: process.env.NODE_ENV === 'production'
        ? ''
        : 'http://localhost:8081/',
    filenameHashing: false,
    css: {
        extract: true
    },
    devServer: {
        port: 8081,
        allowedHosts: [
            'realtor.local',
            '127.0.0.1',
        ],
        historyApiFallback: true,
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, PATCH, OPTIONS",
            "Access-Control-Allow-Headers": "X-Requested-With, content-type, Authorization"
        }
    },
    runtimeCompiler: true,
}