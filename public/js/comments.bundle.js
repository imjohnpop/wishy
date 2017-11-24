webpackJsonp([1],{

/***/ 35:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(1);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _comments = __webpack_require__(36);

var _comments2 = _interopRequireDefault(_comments);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

_reactDom2.default.render(_react2.default.createElement(_comments2.default, null), document.getElementById('comment-list'));

/***/ }),

/***/ 36:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(1);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _comment = __webpack_require__(37);

var _comment2 = _interopRequireDefault(_comment);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Comments = function (_React$Component) {
    _inherits(Comments, _React$Component);

    function Comments(props) {
        _classCallCheck(this, Comments);

        var _this = _possibleConstructorReturn(this, (Comments.__proto__ || Object.getPrototypeOf(Comments)).call(this, props));

        _this.state = {
            comments: []
        };
        return _this;
    }

    _createClass(Comments, [{
        key: 'componentDidMount',
        value: function componentDidMount() {

            var category = $('a[title="Encourage"]').data('category');
            var target_id = $('a[title="Encourage"]').data('id');
            this.refreshComments(target_id, category);
        }
    }, {
        key: 'refreshComments',
        value: function refreshComments(target_id, category) {
            var self = this;
            $.ajax({
                type: 'get',
                url: '/api/comment/' + category + '/' + target_id,
                data: {}
            }).done(function (data) {
                self.setState({
                    comments: data
                });
            });
        }
    }, {
        key: 'render',
        value: function render() {
            var comments = [];
            for (var i in this.state.comments) {
                comments[i] = _react2.default.createElement(_comment2.default, { refreshComments: this.refreshComments.bind(this),
                    name: this.state.comments[i].name,
                    surname: this.state.comments[i].surname,
                    date: this.state.comments[i].created_at,
                    text: this.state.comments[i].text,
                    id: this.state.comments[i].id,
                    user_id: this.state.comments[i].user_id
                });
            }
            return _react2.default.createElement(
                'div',
                { className: 'comments', id: 'comment-section' },
                comments
            );
        }
    }]);

    return Comments;
}(_react2.default.Component);

exports.default = Comments;

/***/ }),

/***/ 37:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(1);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _comment_detail = __webpack_require__(38);

var _comment_detail2 = _interopRequireDefault(_comment_detail);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Comment = function (_React$Component) {
    _inherits(Comment, _React$Component);

    function Comment() {
        _classCallCheck(this, Comment);

        return _possibleConstructorReturn(this, (Comment.__proto__ || Object.getPrototypeOf(Comment)).apply(this, arguments));
    }

    _createClass(Comment, [{
        key: 'render',
        value: function render() {
            return _react2.default.createElement(
                'div',
                { className: 'comments row' },
                _react2.default.createElement('img', { style: 'width:3em; height:3em; border-radius:50%;', className: 'col-2', src: '/uploads/', alt: 'Profile picture' }),
                _react2.default.createElement(_comment_detail2.default, {
                    name: this.state.comments[i].name,
                    surname: this.state.comments[i].surname,
                    date: this.state.comments[i].created_at,
                    text: this.state.comments[i].text,
                    id: this.state.comments[i].id,
                    user_id: this.state.comments[i].user_id
                }),
                _react2.default.createElement('hr', null)
            );
        }
    }]);

    return Comment;
}(_react2.default.Component);

exports.default = Comment;

/***/ }),

/***/ 38:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(1);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _links = __webpack_require__(39);

var _links2 = _interopRequireDefault(_links);

var _edit_form = __webpack_require__(40);

var _edit_form2 = _interopRequireDefault(_edit_form);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var CommentDetail = function (_React$Component) {
    _inherits(CommentDetail, _React$Component);

    function CommentDetail() {
        _classCallCheck(this, CommentDetail);

        return _possibleConstructorReturn(this, (CommentDetail.__proto__ || Object.getPrototypeOf(CommentDetail)).apply(this, arguments));
    }

    _createClass(CommentDetail, [{
        key: 'render',
        value: function render() {
            return _react2.default.createElement(
                'div',
                { 'class': 'col-9' },
                _react2.default.createElement(
                    'h5',
                    null,
                    ' ',
                    this.props.name,
                    ' ',
                    this.props.surname
                ),
                _react2.default.createElement(
                    'sub',
                    null,
                    'Added at: ',
                    _react2.default.createElement(
                        'span',
                        null,
                        'fecha de cuando a\xF1adieron esta mierda'
                    )
                ),
                _react2.default.createElement(
                    'p',
                    null,
                    'Texto de la mierda'
                ),
                _react2.default.createElement(_edit_form2.default, null),
                _react2.default.createElement(
                    'a',
                    { href: '#', title: 'Close_edit' },
                    _react2.default.createElement('i', { className: 'fa fa-times-circle-o', 'aria-hidden': 'true' })
                ),
                _react2.default.createElement(_links2.default, null)
            );
        }
    }]);

    return CommentDetail;
}(_react2.default.Component);

exports.default = CommentDetail;

/***/ }),

/***/ 39:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(1);

var _reactDom2 = _interopRequireDefault(_reactDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Links = function (_React$Component) {
    _inherits(Links, _React$Component);

    function Links() {
        _classCallCheck(this, Links);

        return _possibleConstructorReturn(this, (Links.__proto__ || Object.getPrototypeOf(Links)).apply(this, arguments));
    }

    _createClass(Links, [{
        key: 'render',
        value: function render() {
            return _react2.default.createElement(
                'div',
                { className: 'links' },
                _react2.default.createElement(
                    'a',
                    { className: 'comment_edit', href: '#' },
                    _react2.default.createElement('i', { className: 'fa fa-pencil', 'aria-hidden': 'true' })
                ),
                _react2.default.createElement(
                    'a',
                    { className: 'comment_delete', href: '{{action(\'CommentController@destroy\', [\'id\' => $this_comment[\'id\']])}}' },
                    _react2.default.createElement('i', { className: 'fa fa-trash', 'aria-hidden': 'true' })
                )
            );
        }
    }]);

    return Links;
}(_react2.default.Component);

exports.default = Links;

/***/ }),

/***/ 40:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(1);

var _reactDom2 = _interopRequireDefault(_reactDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var EditForm = function (_React$Component) {
    _inherits(EditForm, _React$Component);

    function EditForm() {
        _classCallCheck(this, EditForm);

        return _possibleConstructorReturn(this, (EditForm.__proto__ || Object.getPrototypeOf(EditForm)).apply(this, arguments));
    }

    _createClass(EditForm, [{
        key: 'render',
        value: function render() {
            return _react2.default.createElement(
                'form',
                { action: '{{action(\'CommentController@update\', [\'id\' => $this_comment[\'id\']])}}' },
                _react2.default.createElement('input', { type: 'text', name: 'text', value: '{{$this_comment[\'text\']}}' }),
                _react2.default.createElement(
                    'button',
                    { className: 'comment_update', type: 'submit' },
                    'Comment'
                )
            );
        }
    }]);

    return EditForm;
}(_react2.default.Component);

exports.default = EditForm;

/***/ })

},[35]);