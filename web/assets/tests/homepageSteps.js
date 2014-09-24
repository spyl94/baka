
var env = require('./environment.js');
var chai = require('chai');
var chaiAsPromised = require('chai-as-promised');
chai.use(chaiAsPromised);

var expect = chai.expect;

module.exports = function() {

    this.Given(/^I am on the homepage$/, function(next) {
        browser.get(env.baseUrl);
        next();
    });

    this.Then(/^I can see a list of mangas$/, function(next) {

        mangas = element.all(by.css('.nav-sidebar li a')).map(function(e, index) {
          return {
            index: index,
            text: e.getText()
          };
        });

        expect(mangas).to.eventually.eql([
            {index: 0, text: 'Death Note'},
            {index: 1, text: 'Naruto'},
            {index: 2, text: 'One Piece'}
        ]).and.notify(next);
    });

    this.Then(/^I can click to start reading$/, function(next) {

        element.all(by.css('.nav-sidebar li a')).first().click().then(function() {
            expect(browser.getCurrentUrl()).to.eventually.equal(env.baseUrl+'#/mangas/Death%20Note').and.notify(next);
        });
    });
};
