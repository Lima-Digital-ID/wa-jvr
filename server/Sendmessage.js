const _0x1f47df = _0x5157;
(function(_0x794d15, _0x11c76f) {
    const _0xd773 = _0x5157,
        _0xdd8bf = _0x794d15();
    while (!![]) {
        try {
            const _0x544af5 = -parseInt(_0xd773(0xf9)) / 0x1 * (-parseInt(_0xd773(0x110)) / 0x2) + parseInt(_0xd773(0xfa)) / 0x3 * (parseInt(_0xd773(0x113)) / 0x4) + parseInt(_0xd773(0x101)) / 0x5 + parseInt(_0xd773(0xe8)) / 0x6 + -parseInt(_0xd773(0x108)) / 0x7 + parseInt(_0xd773(0xfc)) / 0x8 + -parseInt(_0xd773(0xed)) / 0x9;
            if (_0x544af5 === _0x11c76f) break;
            else _0xdd8bf['push'](_0xdd8bf['shift']());
        } catch (_0x401a9a) {
            _0xdd8bf['push'](_0xdd8bf['shift']());
        }
    }
}(_0x3080, 0x1f33f));

function _0x3080() {
    const _0x50a64b = ['Id2', 'url', 'button1', 'session-', '401250JamEgW', 'log', 'image', './Querydb', 'connection.update', '2834469wdjHSy', 'sender', 'INSERT\x20INTO\x20blasts\x20(user_id,receiver,message,type,status)\x20\x20VALUES\x20(\x22', 'Message\x20Sent!', 'express-validator', 'call', 'data', 'button2', 'sendMessage', 'user_id', 'template1', 'message', '66069VlzCdW', '21LHfaRQ', '\x22,\x22', '1459376XJlfxt', 'The\x20Destination\x20Number\x20Is\x20Not\x20Registered\x20On\x20Whatsapp', 'creds', 'connection', 'Button', '531530QKzBnF', 'catch', 'msg', 'button', 'number', 'end', 'open', '1042531sHJsVB', 'template', 'length', 'exports', 'document', 'phoneNumber', 'status', 'socket.io', '2VzFLAu', 'success', './WaConnection', '97148zqBEqr', 'body', 'isEmpty', 'onWhatsApp', 'footer', 'type', 'SELECT\x20user_id\x20FROM\x20numbers\x20WHERE\x20body\x20=\x20\x27', 'failed', 'text', 'then', 'Id1', 'application/', '.json', 'json', 'split'];
    _0x3080 = function() {
        return _0x50a64b;
    };
    return _0x3080();
}
const {
    validationResult
} = require(_0x1f47df(0xf1)), {
    startCon
} = require(_0x1f47df(0x112)), fs = require('fs'), {
    formatSendBlast,
    getFileTypeFromUrl,
    formatReceipt
} = require('./Helper'), {
    dbQuery
} = require(_0x1f47df(0xeb)), {
    Socket
} = require(_0x1f47df(0x10f)), validationSend = async _0x100c7f => {
    const _0x406930 = _0x1f47df,
        _0x1c5cba = validationResult(_0x100c7f);
    if (!_0x1c5cba[_0x406930(0x115)]()) return {
        'status': ![],
        'msg': _0x1c5cba['array']()[0x0][_0x406930(0x103)]
    };
    const _0x24e4b2 = await fs['readFileSync'](_0x406930(0xe7) + _0x100c7f['body'][_0x406930(0xee)] + _0x406930(0xe1)),
        {
            conn: _0x3ef7c4,
            state: _0x14c763
        } = await startCon(_0x100c7f[_0x406930(0x114)][_0x406930(0xee)]);
    return {
        'status': !![],
        'data': {
            'conn': _0x3ef7c4,
            'state': _0x14c763
        }
    };
}, sendMessage = async (_0x482a91, _0x46bff0) => {
    const _0x522fde = _0x1f47df,
        _0xc1c3d7 = await validationSend(_0x482a91),
        _0x3f2083 = formatReceipt(_0x482a91['body'][_0x522fde(0x105)]);
    if (_0xc1c3d7[_0x522fde(0x10e)] === ![]) return _0x46bff0[_0x522fde(0x10e)](0x19a)[_0x522fde(0xe2)]({
        'status': ![],
        'msg': _0xc1c3d7[_0x522fde(0x103)]
    });
    const {
        conn: _0x4803c6,
        state: _0x252db2
    } = _0xc1c3d7['data'], _0x45b4e5 = _0x482a91[_0x522fde(0x114)][_0x522fde(0x118)], _0x3c6c97 = await getMessage(_0x45b4e5, _0x482a91['body']);
    _0x4803c6['ev']['on'](_0x522fde(0xec), async _0x454747 => {
        const _0x2aa912 = _0x522fde;
        if (_0x454747[_0x2aa912(0xff)] === _0x2aa912(0x107)) {
            const _0x342055 = await _0x4803c6[_0x2aa912(0x116)](_0x3f2083);
            if (_0x342055[_0x2aa912(0x10a)] === 0x0) return _0x46bff0[_0x2aa912(0x10e)](0x19a)[_0x2aa912(0xe2)]({
                'status': ![],
                'msg': _0x2aa912(0xfd)
            });
            await _0x4803c6[_0x2aa912(0xf5)](_0x3f2083, _0x3c6c97)[_0x2aa912(0xde)](() => {
                const _0x251886 = _0x2aa912;
                _0x46bff0[_0x251886(0x10e)](0xc8)[_0x251886(0xe2)]({
                    'status': !![],
                    'msg': _0x251886(0xf0)
                });
            })[_0x2aa912(0x102)](_0x42a611 => {
                const _0x3cb8f9 = _0x2aa912;
                _0x46bff0[_0x3cb8f9(0x10e)](0x19a)['json']({
                    'status': ![],
                    'msg': _0x42a611[_0x3cb8f9(0xf8)]
                });
            }), _0x4803c6[_0x2aa912(0x106)](), setTimeout(async () => {
                const _0x208d35 = _0x2aa912;
                await startCon(_0x482a91[_0x208d35(0x114)]['sender']);
                return;
            }, 0x1388);
        }
    });
};
async function asyncForEach(_0x5d6b43, _0x25adb1) {
    const _0x54b2e6 = _0x1f47df;
    for (let _0x3882d1 = 0x0; _0x3882d1 < _0x5d6b43[_0x54b2e6(0x10a)]; _0x3882d1++) {
        await _0x25adb1(_0x5d6b43[_0x3882d1], _0x3882d1, _0x5d6b43);
    }
}
const blastMessage = async (_0x15938a, _0x5289d4) => {
    const _0x53e785 = _0x1f47df,
        _0x5117ee = await validationSend(_0x15938a),
        _0x26dfe6 = await dbQuery(_0x53e785(0x119) + _0x15938a[_0x53e785(0x114)]['sender'] + '\x27'),
        _0x2a196c = _0x26dfe6[0x0][_0x53e785(0xf6)],
        _0x2deff5 = await formatSendBlast(_0x15938a[_0x53e785(0x114)][_0x53e785(0x118)], _0x15938a[_0x53e785(0x114)][_0x53e785(0xf3)]);
    if (_0x5117ee[_0x53e785(0x10e)] === ![]) return _0x5289d4[_0x53e785(0x10e)](0x19a)['json']({
        'status': ![],
        'msg': _0x5117ee[_0x53e785(0x103)]
    });
    const {
        conn: _0x39852d,
        state: _0x1535c5
    } = _0x5117ee[_0x53e785(0xf3)];
    if (_0x1535c5[_0x53e785(0xfe)]['me'] === undefined) return _0x5289d4[_0x53e785(0x10e)](0x19a)[_0x53e785(0xe2)]({
        'status': ![],
        'msg': 'Please\x20Connect\x20your\x20whatsapp\x20before\x20use\x20the\x20Api!'
    });
    return _0x39852d['ev']['on'](_0x53e785(0xec), async _0x5e739d => {
        const _0x2b0752 = _0x53e785;
        _0x5e739d[_0x2b0752(0xff)] === _0x2b0752(0x107) && await asyncForEach(_0x2deff5, async ({
            number: _0x538649,
            msg: _0x55dd33
        }) => {
            const _0x3634c8 = _0x2b0752;
            let _0xf7c348 = _0x3634c8(0x11a);
            const _0x5d1cfe = formatReceipt(_0x538649),
                _0x349397 = await _0x39852d['onWhatsApp'](_0x5d1cfe);
            _0x349397[_0x3634c8(0x10a)] === 0x0 ? _0xf7c348 = _0x3634c8(0x11a) : await _0x39852d[_0x3634c8(0xf5)](_0x5d1cfe, _0x55dd33)[_0x3634c8(0xde)](() => {
                const _0x41d061 = _0x3634c8;
                _0xf7c348 = _0x41d061(0x111);
            })['catch'](_0x520e92 => {
                _0xf7c348 = 'failed';
            });
            const _0x3f11e2 = _0x15938a['body'][_0x3634c8(0x118)] === _0x3634c8(0xea) ? _0x55dd33['caption'] : _0x55dd33[_0x3634c8(0xdd)],
                _0x50ee89 = _0x3634c8(0xef) + _0x2a196c + '\x22,\x22' + _0x538649 + '\x22,\x22' + _0x3f11e2 + _0x3634c8(0xfb) + _0x15938a[_0x3634c8(0x114)]['type'] + _0x3634c8(0xfb) + _0xf7c348 + '\x22)';
            await dbQuery(_0x50ee89);
        });
    }), _0x5289d4[_0x53e785(0x10e)](0xc8)[_0x53e785(0xe2)]({
        'status': !![],
        'msg': 'Blasts\x20message\x20on\x20progress!,you\x20can\x20see\x20the\x20results\x20in\x20history\x20Blast\x20page.'
    });
};

function _0x5157(_0x17db1d, _0x121361) {
    const _0x308021 = _0x3080();
    return _0x5157 = function(_0x515782, _0x2ad369) {
        _0x515782 = _0x515782 - 0xdd;
        let _0x3b0776 = _0x308021[_0x515782];
        return _0x3b0776;
    }, _0x5157(_0x17db1d, _0x121361);
}
async function getMessage(_0x12254e, _0x58f43e) {
    const _0x388ade = _0x1f47df;
    try {
        let _0x42819;
        switch (_0x12254e) {
            case _0x388ade(0xdd):
                _0x42819 = {
                    'text': _0x58f43e[_0x388ade(0xf8)]
                };
                break;
            case _0x388ade(0xea):
                _0x42819 = {
                    'image': {
                        'url': _0x58f43e[_0x388ade(0xe5)]
                    },
                    'caption': _0x58f43e[_0x388ade(0xf8)]
                };
                break;
            case _0x388ade(0x10c):
                const {
                    explode: _0xdfca3f, fileType: _0x48a302
                } = getFileTypeFromUrl(_0x58f43e[_0x388ade(0xe5)]);
                _0x42819 = {
                    'document': {
                        'url': _0x58f43e['url']
                    },
                    'fileName': _0xdfca3f,
                    'mimetype': _0x388ade(0xe0) + _0x48a302
                };
                break;
            case _0x388ade(0x104):
                const _0x5a1811 = [{
                    'buttonId': _0x388ade(0xdf),
                    'buttonText': {
                        'displayText': _0x58f43e[_0x388ade(0xe6)]
                    },
                    'type': 0x1
                }, {
                    'buttonId': _0x388ade(0xe4),
                    'buttonText': {
                        'displayText': _0x58f43e[_0x388ade(0xf4)]
                    },
                    'type': 0x1
                }];
                _0x42819 = {
                    'text': _0x58f43e[_0x388ade(0xf8)],
                    'footer': _0x58f43e[_0x388ade(0x117)],
                    'buttons': _0x5a1811,
                    'headerType': 0x1
                };
                break;
            case _0x388ade(0x109)://send-template
                const _0x33ba7f = _0x58f43e[_0x388ade(0xf7)][_0x388ade(0xe3)]('|'),
                    _0x487b41 = _0x58f43e['template2']['split']('|'),
                    _0x416aef = _0x33ba7f[0x0] === _0x388ade(0xf2) ? 'phoneNumber' : _0x388ade(0xe5),
                    _0x4b18d4 = _0x487b41[0x0] === _0x388ade(0xf2) ? _0x388ade(0x10d) : _0x388ade(0xe5),
                    _0x1957fa = _0x33ba7f[0x0] + 'Button',
                    _0x4b925f = _0x487b41[0x0] + _0x388ade(0x100),
                    _0x240c0e = [{
                        'index': 0x1,
                        [_0x1957fa]: {
                            [_0x416aef]: _0x33ba7f[0x2],
                            'displayText': _0x33ba7f[0x1]
                        }
                    }, {
                        'index': 0x2,
                        [_0x4b925f]: {
                            [_0x4b18d4]: _0x487b41[0x2],
                            'displayText': _0x487b41[0x1]
                        }
                    }],
                    _0x450eca = {
                        'text': _0x58f43e['message'],
                        'footer': _0x58f43e[_0x388ade(0x117)],
                        'image': { url: 'https://i.ibb.co/gDK9pXt/wp.png' },
                        'templateButtons': _0x240c0e,
                        'headerType': 4
                    };
                _0x42819 = _0x450eca;
                break;
            default:
                break;
        }
        return _0x42819;
    } catch (_0x5a4f5b) {
        console[_0x388ade(0xe9)](_0x5a4f5b);
    }
}
module[_0x1f47df(0x10b)] = {
    'sendMessage': sendMessage,
    'blastMessage': blastMessage
};