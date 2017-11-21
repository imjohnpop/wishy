webpackJsonp([0],{

/***/ 15:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

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

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _checklists = __webpack_require__(28);

var _checklists2 = _interopRequireDefault(_checklists);

var _input = __webpack_require__(33);

var _input2 = _interopRequireDefault(_input);

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
        key: 'refreshChecklists',
        value: function refreshChecklists(goal_id) {
            this.checklist.refreshChecklists(goal_id);
        }
    }, {
        key: 'render',
        value: function render() {
            var _this2 = this;

            return _react2.default.createElement(
                'div',
                { className: 'col-12' },
                _react2.default.createElement(
                    'div',
                    { id: 'togglingInput', className: 'col-10 mx-auto' },
                    _react2.default.createElement(_input2.default, { refreshChecklists: this.refreshChecklists.bind(this) })
                ),
                _react2.default.createElement(_checklists2.default, { ref: function ref(el) {
                        _this2.checklist = el;
                    } })
            );
        }
    }]);

    return Planner;
}(_react2.default.Component);

exports.default = Planner;

/***/ }),

/***/ 28:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _checklist = __webpack_require__(29);

var _checklist2 = _interopRequireDefault(_checklist);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Checklists = function (_React$Component) {
    _inherits(Checklists, _React$Component);

    function Checklists(props) {
        _classCallCheck(this, Checklists);

        var _this = _possibleConstructorReturn(this, (Checklists.__proto__ || Object.getPrototypeOf(Checklists)).call(this, props));

        _this.state = {
            lists: []
        };

        return _this;
    }

    _createClass(Checklists, [{
        key: 'componentDidMount',
        value: function componentDidMount() {

            var goal_id = $('#checklists').data('goal');

            this.refreshChecklists(goal_id);
        }
    }, {
        key: 'refreshChecklists',
        value: function refreshChecklists(goal_id) {
            var self = this;
            $.ajax({
                type: 'post',
                url: '/api/checklists/' + goal_id,
                data: {}
            }).done(function (data) {
                self.setState({
                    lists: data
                });
            });
        }
    }, {
        key: 'render',
        value: function render() {
            var lists = [];
            for (var i in this.state.lists) {
                lists[i] = _react2.default.createElement(_checklist2.default, { refreshChecklists: this.refreshChecklists.bind(this),
                    key: this.state.lists[i].id,
                    id: this.state.lists[i].id,
                    goal_id: this.state.lists[i].goal_id,
                    title: this.state.lists[i].title
                });
            }
            return _react2.default.createElement(
                'div',
                { className: 'row' },
                lists
            );
        }
    }]);

    return Checklists;
}(_react2.default.Component);

exports.default = Checklists;

/***/ }),

/***/ 29:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

var _reactDom2 = _interopRequireDefault(_reactDom);

var _check = __webpack_require__(30);

var _check2 = _interopRequireDefault(_check);

var _newcheck = __webpack_require__(31);

var _newcheck2 = _interopRequireDefault(_newcheck);

var _progress = __webpack_require__(32);

var _progress2 = _interopRequireDefault(_progress);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Checklist = function (_React$Component) {
    _inherits(Checklist, _React$Component);

    function Checklist(props) {
        _classCallCheck(this, Checklist);

        var _this = _possibleConstructorReturn(this, (Checklist.__proto__ || Object.getPrototypeOf(Checklist)).call(this, props));

        _this.state = {
            checks: [],
            nr_of_checks: '',
            nr_of_done: '',
            percent: ''
        };
        return _this;
    }

    _createClass(Checklist, [{
        key: 'componentDidMount',
        value: function componentDidMount() {
            console.log('done');
            var id = this.props.id;

            this.refreshChecks(id);
        }
    }, {
        key: 'refreshChecks',
        value: function refreshChecks(id) {
            var _this2 = this;

            var self = this;
            $.ajax({
                type: 'post',
                url: '/api/checks/' + id,
                data: {}
            }).done(function (data) {
                self.setState({
                    checks: data
                });
                _this2.percent();
            });
        }
    }, {
        key: 'percent',
        value: function percent() {
            var all = this.state.checks.length;

            var done = 0;
            for (var i in this.state.checks) {
                if (this.state.checks[i].is_done == 0) {
                    continue;
                } else {
                    done = done + 1;
                }
            }
            var percentage = done / all;
            console.log(percentage * 100 + '%');

            this.setState({
                percent: percentage * 100 + '%'
            });
        }
    }, {
        key: 'newCheck',
        value: function newCheck(text) {
            var _this3 = this;

            var id = this.props.id;
            $.ajax({
                type: 'post',
                url: '/api/check/new/' + id,
                data: {
                    text: text
                }
            }).done(function (data) {
                _this3.refreshChecks(id);
            });
        }
    }, {
        key: 'deleteChecklist',
        value: function deleteChecklist() {
            var _this4 = this;

            var id = this.props.id;
            var self = this;
            $.ajax({
                type: 'post',
                url: '/api/check/delete/' + id,
                data: {}
            }).done(function (data) {
                _this4.props.refreshChecklists($('#checklists').data('goal'));
            });
        }
    }, {
        key: 'render',
        value: function render() {
            var _this5 = this;

            var checks = [];
            for (var i in this.state.checks) {
                checks[i] = _react2.default.createElement(_check2.default, { refreshChecks: this.refreshChecks.bind(this),
                    key: this.state.checks[i].id,
                    id: this.state.checks[i].id,
                    checklist_id: this.state.checks[i].checklist_id,
                    text: this.state.checks[i].text,
                    due_date: this.state.checks[i].due_date,
                    is_done: this.state.checks[i].is_done
                });
            }

            return _react2.default.createElement(
                'div',
                { className: 'col-12' },
                _react2.default.createElement('hr', null),
                _react2.default.createElement(
                    'div',
                    { className: 'row d-flex justify-content-between align-middle' },
                    _react2.default.createElement(
                        'div',
                        { className: 'col-8 my-2' },
                        _react2.default.createElement(
                            'span',
                            null,
                            _react2.default.createElement('i', { className: 'fa fa-check-square-o', 'aria-hidden': 'true' }),
                            this.props.title
                        )
                    ),
                    _react2.default.createElement(
                        'div',
                        { className: 'col-4 d-flex justify-content-end' },
                        _react2.default.createElement(
                            'button',
                            { onClick: function onClick() {
                                    return _this5.deleteChecklist();
                                }, className: 'btn' },
                            _react2.default.createElement('i', { className: 'fa fa-trash-o', 'aria-hidden': 'true' })
                        )
                    )
                ),
                _react2.default.createElement(_progress2.default, { percent: this.state.percent }),
                checks,
                _react2.default.createElement(
                    'div',
                    { className: 'row' },
                    _react2.default.createElement(_newcheck2.default, { newCheck: this.newCheck.bind(this) })
                )
            );
        }
    }]);

    return Checklist;
}(_react2.default.Component);

exports.default = Checklist;

/***/ }),

/***/ 30:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

var _reactDom2 = _interopRequireDefault(_reactDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Check = function (_React$Component) {
    _inherits(Check, _React$Component);

    function Check(props) {
        _classCallCheck(this, Check);

        var _this = _possibleConstructorReturn(this, (Check.__proto__ || Object.getPrototypeOf(Check)).call(this, props));

        _this.state = {
            date: ''
        };
        return _this;
    }

    _createClass(Check, [{
        key: 'componentDidMount',
        value: function componentDidMount() {
            this.setState({
                date: this.props.due_date
            });
        }
    }, {
        key: 'checking',
        value: function checking(event, id) {
            var self = this;
            $.ajax({
                type: 'post',
                url: '/api/check/' + id,
                data: {
                    checked: event.target.checked
                }
            }).done(function (data) {
                self.props.refreshChecks(self.props.checklist_id);
            });
        }
    }, {
        key: 'selecting',
        value: function selecting(event) {
            console.log('date');
            this.setState({
                date: event.target.value
            });
        }
    }, {
        key: 'submitDate',
        value: function submitDate(id) {
            if (this.state.date !== '') {
                var self = this;
                $.ajax({
                    type: 'post',
                    url: '/api/check/date/' + id,
                    data: {
                        date: self.state.date
                    }
                }).done(function (data) {});
            }
        }
    }, {
        key: 'render',
        value: function render() {
            var _this2 = this;

            return _react2.default.createElement(
                'div',
                { className: 'planner-checks d-flex justify-content-between' },
                _react2.default.createElement(
                    'div',
                    null,
                    _react2.default.createElement('input', { onChange: function onChange(event) {
                            return _this2.checking(event, _this2.props.id);
                        }, type: 'checkbox', checked: this.props.is_done }),
                    ' ',
                    this.props.text
                ),
                _react2.default.createElement(
                    'div',
                    { className: 'datepicker' },
                    _react2.default.createElement('input', { onChange: function onChange(event) {
                            return _this2.selecting(event);
                        }, type: 'date', value: this.state.date, name: 'dateselector' }),
                    _react2.default.createElement(
                        'span',
                        null,
                        _react2.default.createElement('i', { onClick: function onClick() {
                                return _this2.submitDate(_this2.props.id);
                            }, className: 'fa fa-check-square fa-lg', 'aria-hidden': 'true' })
                    )
                )
            );
        }
    }]);

    return Check;
}(_react2.default.Component);

exports.default = Check;

/***/ }),

/***/ 31:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

var _reactDom2 = _interopRequireDefault(_reactDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Newcheck = function (_React$Component) {
    _inherits(Newcheck, _React$Component);

    function Newcheck(props) {
        _classCallCheck(this, Newcheck);

        var _this = _possibleConstructorReturn(this, (Newcheck.__proto__ || Object.getPrototypeOf(Newcheck)).call(this, props));

        _this.state = {
            value: ''
        };

        return _this;
    }

    _createClass(Newcheck, [{
        key: 'value',
        value: function value(event) {
            this.setState({
                value: event.target.value
            });
        }
    }, {
        key: 'render',
        value: function render() {
            var _this2 = this;

            return _react2.default.createElement(
                'div',
                { className: 'col-12 text-secondary newMilestone' },
                _react2.default.createElement(
                    'small',
                    null,
                    _react2.default.createElement('i', { onClick: function onClick() {
                            return _this2.props.newCheck(_this2.state.value);
                        }, className: 'fa fa-plus', 'aria-hidden': 'true' }),
                    _react2.default.createElement('input', { onChange: function onChange(event) {
                            return _this2.value(event);
                        }, className: 'ml-2', type: 'text', placeholder: 'Add new milestone' })
                )
            );
        }
    }]);

    return Newcheck;
}(_react2.default.Component);

exports.default = Newcheck;

/***/ }),

/***/ 32:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

var _reactDom2 = _interopRequireDefault(_reactDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Progress = function (_React$Component) {
    _inherits(Progress, _React$Component);

    function Progress(props) {
        _classCallCheck(this, Progress);

        return _possibleConstructorReturn(this, (Progress.__proto__ || Object.getPrototypeOf(Progress)).call(this, props));
    }

    _createClass(Progress, [{
        key: 'render',
        value: function render() {
            var percent = this.props.percent;
            console.log(this.props.percent);
            return _react2.default.createElement(
                'div',
                { className: 'row progress w-100 mx-auto my-3' },
                _react2.default.createElement('div', { className: 'progress-bar wishy', role: 'progressbar', style: { width: this.props.percent }, 'aria-valuenow': '75', 'aria-valuemin': '0', 'aria-valuemax': '100' })
            );
        }
    }]);

    return Progress;
}(_react2.default.Component);

exports.default = Progress;

/***/ }),

/***/ 33:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(0);

var _react2 = _interopRequireDefault(_react);

var _reactDom = __webpack_require__(2);

var _reactDom2 = _interopRequireDefault(_reactDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Input = function (_React$Component) {
    _inherits(Input, _React$Component);

    function Input() {
        _classCallCheck(this, Input);

        return _possibleConstructorReturn(this, (Input.__proto__ || Object.getPrototypeOf(Input)).apply(this, arguments));
    }

    _createClass(Input, [{
        key: 'ChecklistCreated',
        value: function ChecklistCreated() {
            var _this2 = this;

            $.ajax({
                "url": "/api/checklist/new",
                "type": "post",
                "data": {
                    "goal_id": $('#checklists').data('goal'),
                    "title": $('#input').val()
                }
            }).done(function (data) {
                $('#input').value = '';
                _this2.props.refreshChecklists($('#checklists').data('goal'));
            });
        }
    }, {
        key: 'render',
        value: function render() {
            var _this3 = this;

            return _react2.default.createElement(
                'div',
                { id: 'checklistInput', className: 'row bg-dark mx-auto rounded' },
                _react2.default.createElement(
                    'div',
                    { className: 'col-7' },
                    _react2.default.createElement('input', { id: 'input', type: 'text', className: 'form-control w-100 my-2', placeholder: 'Enter title' })
                ),
                _react2.default.createElement(
                    'div',
                    { className: 'col-4' },
                    _react2.default.createElement(
                        'button',
                        { onClick: function onClick() {
                                return _this3.ChecklistCreated();
                            }, className: 'btn wishy-btn my-2' },
                        'Create'
                    )
                )
            );
        }
    }]);

    return Input;
}(_react2.default.Component);

exports.default = Input;

/***/ })

},[15]);