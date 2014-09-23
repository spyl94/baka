exports.config = {

  capabilities: {
    'browserName': 'chrome',
    'chromeOptions': {
      'args': ['show-fps-counter=true', 'no-sandbox', 'no-default-browser-check', 'no-first-run', 'disable-default-apps']
    }
  },

  // A base URL for your application under test.
  baseUrl: (process.env.BASE_URL || 'http://baka.dev/app_test.php'),
  framework: 'cucumber',

  // Spec patterns are relative to this directory.
  specs: [
    'features/frontend/*.feature'
  ],

  cucumberOpts: {
    require: [
      'web/assets/tests/homepageSteps.js',
      'web/assets/tests/readSteps.js'
    ],
    format: 'pretty'
  }
};
