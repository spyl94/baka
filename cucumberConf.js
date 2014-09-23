var env = require('./web/assets/tests/environment.js');

exports.config = {

  capabilities: {
    'browserName': 'chrome',
    'chromeOptions': {
      'args': ['show-fps-counter=true', 'no-sandbox', 'no-default-browser-check', 'no-first-run', 'disable-default-apps']
    }
  },
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
