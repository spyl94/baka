exports.config = {

  capabilities: {
    'browserName': 'chrome',
    'chromeOptions': {
      'args': ['show-fps-counter=true']
    }
  },

  // A base URL for your application under test.
  baseUrl: 'http://baka.dev/app_test.php',
  framework: 'cucumber',

  // Spec patterns are relative to this directory.
  specs: [
    'features/frontend/*.feature'
  ],

  cucumberOpts: {
    require: 'web/assets/tests/stepDefinitions.js',
    format: 'pretty'
  }
};
