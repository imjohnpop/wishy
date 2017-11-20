webpackJsonp([0],{

/***/ 15:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _react = __webpack_require__(2);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(7);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _planner = __webpack_require__(27);

var _planner2 = _interopRequireDefault(_planner);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

_reactDom2.default.render(_react2.default.createElement(_planner2.default, null), document.getElementById('checklists'));

/***/ }),

/***/ 27:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(2);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(7);

var _reactDom2 = _interopRequireDefault(_reactDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Planner = function (_React$Component) {
    _inherits(Planner, _React$Component);

    function Planner() {
        _classCallCheck(this, Planner);

        return _possibleConstructorReturn(this, (Planner.__proto__ || Object.getPrototypeOf(Planner)).apply(this, arguments));
    }

    _createClass(Planner, [{
        key: 'render',
        value: function render() {
            return _react2.default.createElement(
                'div',
                { className: 'col-10 bg-dark mx-auto rounded' },
                _react2.default.createElement(
                    'div',
                    { className: 'row' },
                    _react2.default.createElement(
                        'div',
                        { className: 'col-8' },
                        _react2.default.createElement('input', { type: 'text', 'data-goal': '{{ $goal->id }}', className: 'form-control w-100 my-2', placeholder: 'Enter title' })
                    ),
                    _react2.default.createElement(
                        'div',
                        { className: 'col-4' },
                        _react2.default.createElement(
                            'button',
                            { id: 'createChecklist', className: 'btn wishy-btn my-2' },
                            'Create'
                        )
                    )
                )
            );
        }
    }]);

    return Planner;
}(_react2.default.Component);

exports.default = Planner;

/***/ })

},[15]);