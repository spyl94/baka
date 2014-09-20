
var chai = require('chai');
var chaiAsPromised = require('chai-as-promised');
chai.use(chaiAsPromised);

var expect = chai.expect;

module.exports = function() {

    this.Given(/^I am on the homepage$/, function(next) {
        browser.get('http://baka.dev/app_test.php');
        next();
    });

    this.Then(/^I can see a list of mangas$/, function(next) {

        mangas = element.all(by.css('.nav-sidebar li a')).map(function(e, index) {
          return {
            index: index,
            text: e.getText()
          };
        });

        expect(mangas).to.eventually.eql([{index: 0, text: 'Naruto'},{index: 1, text: 'One Piece'}]);
        next();
    });

    this.Then(/^I can click to start reading$/, function(next) {

        element.all(by.css('.nav-sidebar li a')).first().click().then(function() {
            expect(browser.getCurrentUrl()).to.eventually.equal('http://baka.dev/app_test.php#/mangas/Naruto');
            next();
        });
    });
};
