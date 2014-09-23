
module.exports = {

  capabilities: {
    'browserName': 'chrome',
    'chromeOptions': {
      'args': ['show-fps-counter=true', 'no-sandbox', 'no-default-browser-check', 'no-first-run', 'disable-default-apps']
    }
  },

  baseUrl: (process.env.BASE_URL || 'http://baka.dev/app_test.php'),

};
