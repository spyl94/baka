
var chai = require('chai');
var chaiAsPromised = require('chai-as-promised');
chai.use(chaiAsPromised);

var expect = chai.expect;

module.exports = function() {

    this.Given(/^I am on the reading page of "(.*)"$/, function(manga, next) {
        browser.get('http://baka.dev/app_test.php#/mangas/' + manga);
        next();
    });

    this.Then(/^I can see a list of contents$/, function(next) {

        contents = element.all(by.css('.nav-sidebar li a')).map(function(e, index) {
          return {
            index: index,
            text: e.getText()
          };
        });

        expect(contents).to.eventually.eql([
            { index: 0, text: 'Chapitre 01' },
            { index: 1, text: 'Tome 01' },
            { index: 2, text: 'Tome 02' }
        ]).and.notify(next);
    });

    this.Then(/^the default content is "(.*)"$/, function(defaultContent, next) {

        var content = element(by.css('.nav-sidebar li.active a')).getText();
        expect(content).to.eventually.equal(defaultContent).and.notify(next);
    });
};
