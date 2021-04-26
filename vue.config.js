module.exports = {
    devServer: {
      proxy: {
        "/api/": {
          target: 'http://smsurf.app-rox.com/api/',
          pathRewrite: {'^/api/': ''}
          //これでapiが取り除く
        },
      }
    }
  };