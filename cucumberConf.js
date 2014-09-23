var env = require('./web/assets/tests/environment.js');

exports.config = {

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
