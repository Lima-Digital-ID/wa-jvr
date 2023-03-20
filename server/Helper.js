const _0x20587b = _0x5a0b;
(function(_0x4d17de, _0x8124f2) {
    const _0x3ddd1f = _0x5a0b,
        _0x599aa8 = _0x4d17de();
    while (!![]) {
        try {
            const _0x12df16 = parseInt(_0x3ddd1f(0x86)) / 0x1 + parseInt(_0x3ddd1f(0x85)) / 0x2 * (-parseInt(_0x3ddd1f(0x89)) / 0x3) + -parseInt(_0x3ddd1f(0x74)) / 0x4 + parseInt(_0x3ddd1f(0x70)) / 0x5 + parseInt(_0x3ddd1f(0x87)) / 0x6 + -parseInt(_0x3ddd1f(0x77)) / 0x7 + parseInt(_0x3ddd1f(0x84)) / 0x8;
            if (_0x12df16 === _0x8124f2) break;
            else _0x599aa8['push'](_0x599aa8['shift']());
        } catch (_0xa95960) {
            _0x599aa8['push'](_0x599aa8['shift']());
        }
    }
}(_0x3049, 0xdd2b6));

function _0x5a0b(_0x483842, _0x14f78c) {
    const _0x3049ac = _0x3049();
    return _0x5a0b = function(_0x5a0bed, _0x28287a) {
        _0x5a0bed = _0x5a0bed - 0x6e;
        let _0xf090af = _0x3049ac[_0x5a0bed];
        return _0xf090af;
    }, _0x5a0b(_0x483842, _0x14f78c);
}
async function formatSendBlast(_0x490d9b, _0x33a543) {
    const _0xb38cf9 = _0x5a0b;
    let _0x1a632c = [],
        _0x5d18af = 0x0;
    switch (_0x490d9b) {
        case _0xb38cf9(0x7e):
            _0x33a543[_0xb38cf9(0x83)](({
                number: _0x129b27,
                msg: _0x57ce89
            }) => {
                _0x1a632c[_0x5d18af] = {
                    'number': _0x129b27,
                    'msg': {
                        'text': _0x57ce89
                    }
                }, _0x5d18af++;
            });
            break;
        case _0xb38cf9(0x75):
            _0x33a543['data']['forEach'](({
                number: _0x57f946,
                msg: _0x457715
            }) => {
                _0x1a632c[_0x5d18af] = {
                    'number': _0x57f946,
                    'msg': {
                        'image': {
                            'url': _0x33a543['image']
                        },
                        'caption': _0x457715
                    }
                }, _0x5d18af++;
            });
            break;
        case _0xb38cf9(0x76):
            const _0x95ee8f = [{
                'buttonId': _0xb38cf9(0x7b),
                'buttonText': {
                    'displayText': _0x33a543['button1']
                },
                'type': 0x1
            }, {
                'buttonId': _0xb38cf9(0x72),
                'buttonText': {
                    'displayText': _0x33a543[_0xb38cf9(0x88)]
                },
                'type': 0x1
            }];
            _0x33a543['data'][_0xb38cf9(0x83)](({
                number: _0x2cc28b,
                msg: _0x12d010
            }) => {
                const _0x373ae2 = _0xb38cf9,
                    _0x113b83 = {
                        'text': _0x12d010,
                        'footer': _0x33a543[_0x373ae2(0x7f)],
                        'buttons': _0x95ee8f,
                        'headerType': 0x1
                    };
                _0x1a632c[_0x5d18af] = {
                    'number': _0x2cc28b,
                    'msg': _0x113b83
                }, _0x5d18af++;
            });
            break;
        case _0xb38cf9(0x8c):
            const _0x3743f7 = _0x33a543[_0xb38cf9(0x81)][_0xb38cf9(0x6e)]('|'),
                _0x5a27aa = _0x33a543[_0xb38cf9(0x7d)][_0xb38cf9(0x6e)]('|'),
                _0x3f0eb2 = _0x3743f7[0x0] === 'call' ? _0xb38cf9(0x78) : _0xb38cf9(0x80),
                _0x2c70d7 = _0x5a27aa[0x0] === _0xb38cf9(0x6f) ? 'phoneNumber' : _0xb38cf9(0x80),
                _0x27010f = _0x3743f7[0x0] + _0xb38cf9(0x8a),
                _0x1608b2 = _0x5a27aa[0x0] + _0xb38cf9(0x8a),
                _0x1c56df = [{
                    'index': 0x1,
                    [_0x27010f]: {
                        [_0x3f0eb2]: _0x3743f7[0x2],
                        'displayText': _0x3743f7[0x1]
                    }
                }, {
                    'index': 0x2,
                    [_0x1608b2]: {
                        [_0x2c70d7]: _0x5a27aa[0x2],
                        'displayText': _0x5a27aa[0x1]
                    }
                }];
            _0x33a543[_0xb38cf9(0x8e)]['forEach'](({
                number: _0x24da4b,
                msg: _0x202dba
            }) => {
                const _0x162176 = _0xb38cf9,
                    _0x5d8702 = {
                        'text': _0x202dba,
                        'footer': _0x33a543[_0x162176(0x7f)],
                        'templateButtons': _0x1c56df
                    };
                _0x1a632c[_0x5d18af] = {
                    'number': _0x24da4b,
                    'msg': _0x5d8702
                }, _0x5d18af++;
            });
            break;
        default:
            break;
    }
    return _0x1a632c;
}

function getFileTypeFromUrl(_0x52dd10) {
    const _0x5a5cfe = _0x5a0b;
    try {
        const _0x7c9e7c = _0x52dd10[_0x5a5cfe(0x6e)]('/'),
            _0x505a80 = _0x7c9e7c[_0x7c9e7c[_0x5a5cfe(0x82)] - 0x1],
            _0x54a126 = _0x505a80['split']('.'),
            _0x1f80df = _0x54a126[_0x54a126[_0x5a5cfe(0x82)] - 0x1];
        return {
            'explode': _0x505a80,
            'filetype': _0x1f80df
        };
    } catch (_0x2d25c6) {
        console[_0x5a5cfe(0x7a)](_0x2d25c6);
    }
}

function formatReceipt(_0x10da2e) {
    const _0x14bc03 = _0x5a0b;
    try {
        if (_0x10da2e[_0x14bc03(0x79)](_0x14bc03(0x7c))) return _0x10da2e;
        let _0x2d9538 = _0x10da2e[_0x14bc03(0x8b)](/\D/g, '');
        return _0x2d9538[_0x14bc03(0x71)]('0') && (_0x2d9538 = '62' + _0x2d9538[_0x14bc03(0x8d)](0x1)), !_0x2d9538[_0x14bc03(0x79)](_0x14bc03(0x8f)) && (_0x2d9538 += _0x14bc03(0x8f)), _0x2d9538;
    } catch (_0x42190a) {
        console[_0x14bc03(0x7a)](_0x42190a);
    }
}
module[_0x20587b(0x73)] = {
    'formatSendBlast': formatSendBlast,
    'getFileTypeFromUrl': getFileTypeFromUrl,
    'formatReceipt': formatReceipt
};

function _0x3049() {
    const _0x455e41 = ['data', '@c.us', 'split', 'call', '2829045kODpEs', 'startsWith', 'id2', 'exports', '2738556JwNiLm', 'image', 'button', '5422144shkozc', 'phoneNumber', 'endsWith', 'log', 'id1', '@g.us', 'template2', 'text', 'footer', 'url', 'template1', 'length', 'forEach', '2618072JLDxNp', '102lUVExb', '1269415yYxySp', '7480686WsQENd', 'button2', '61419RjkyBl', 'Button', 'replace', 'template', 'substr'];
    _0x3049 = function() {
        return _0x455e41;
    };
    return _0x3049();
}