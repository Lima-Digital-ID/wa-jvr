const _0x282e25 = _0x1a0d;
(function(_0x177bf6, _0x1c1077) {
    const _0x2db06f = _0x1a0d,
        _0x3f2310 = _0x177bf6();
    while (true) {
        try {
            const _0x2f602d = parseInt(_0x2db06f(0x172)) / 0x1 * (-parseInt(_0x2db06f(0x16c)) / 0x2) + -parseInt(_0x2db06f(0x186)) / 0x3 + parseInt(_0x2db06f(0x193)) / 0x4 + parseInt(_0x2db06f(0x190)) / 0x5 * (parseInt(_0x2db06f(0x184)) / 0x6) + parseInt(_0x2db06f(0x17f)) / 0x7 * (-parseInt(_0x2db06f(0x18a)) / 0x8) + -parseInt(_0x2db06f(0x175)) / 0x9 * (parseInt(_0x2db06f(0x187)) / 0xa) + parseInt(_0x2db06f(0x18c)) / 0xb;
            if (_0x2f602d === _0x1c1077) break;
            else _0x3f2310['push'](_0x3f2310['shift']());
        } catch (_0x4835b4) {
            _0x3f2310['push'](_0x3f2310['shift']());
        }
    }
}(_0x56ab, 0xbd6ca));

function _0x1a0d(_0x9d4bb7, _0x1ef5bb) {
    const _0x56abfc = _0x56ab();
    return _0x1a0d = function(_0x1a0dfd, _0x11ea6e) {
        _0x1a0dfd = _0x1a0dfd - 0x16b;
        let _0x18b7d = _0x56abfc[_0x1a0dfd];
        return _0x18b7d;
    }, _0x1a0d(_0x9d4bb7, _0x1ef5bb);
}
const P = require(_0x282e25(0x174)),
    axios = require(_0x282e25(0x18b)),
    {
        default: makeWASocket,
        useSingleFileAuthState,
        DisconnectReason,
        initAuthCreds
    } = require(_0x282e25(0x18e)),
    fs = require('fs'),
    qrcode = require(_0x282e25(0x16f)),
    {
        setStatus,
        dbQuery
    } = require('./Querydb'),
    {
        autoReply
    } = require('./Autoreply'),
    startCon = async (_0xdcb351, _0x219cad = undefined, _0x57517a = undefined) => {
        const _0x26c29e = _0x282e25,
            {
                state: _0x1764fb,
                saveState: _0x2ca2e7
            } = useSingleFileAuthState(_0x26c29e(0x195) + _0xdcb351 + _0x26c29e(0x198)),
            _0x29f691 = makeWASocket({
                'auth': _0x1764fb,
                'version': [0x2, 0x89c, 0xd],
                'logger': P({
                    'level': _0x26c29e(0x197)
                }),
                'printQRInTerminal': false,
                'version': (await axios[_0x26c29e(0x199)](_0x26c29e(0x189)))[_0x26c29e(0x17c)][_0x26c29e(0x182)][_0x26c29e(0x196)]('.'),
                'browser': ['BAMD', _0x26c29e(0x170), '10.0']
            });
        return _0x29f691['ev']['on'](_0x26c29e(0x19a), async _0x7bba0a => {
            const _0xea4697 = _0x26c29e,
                {
                    qr: _0x12cafe,
                    connection: _0x16eaae,
                    lastDisconnect: _0x2703b0
                } = _0x7bba0a;
            if (_0x16eaae === _0xea4697(0x17e)) {
                if (_0x2703b0[_0xea4697(0x179)]?.['output']?.[_0xea4697(0x191)] !== DisconnectReason[_0xea4697(0x178)]) _0x2703b0[_0xea4697(0x179)]?.[_0xea4697(0x19b)]?.[_0xea4697(0x171)] === _0xea4697(0x176) && startCon(_0xdcb351), _0x219cad !== undefined ? _0x219cad[_0xea4697(0x188)]('Proccess') : '';
                else _0x2703b0[_0xea4697(0x179)]?.[_0xea4697(0x19b)]?.[_0xea4697(0x191)] === 0x191 && (_0x219cad[_0xea4697(0x188)]('Unauthorized'), setStatus(_0xdcb351, 'Disconnect'), fs[_0xea4697(0x173)](_0xea4697(0x195) + _0xdcb351 + '.json') && fs[_0xea4697(0x16d)](_0xea4697(0x195) + _0xdcb351 + _0xea4697(0x198)));
            } else {
                if (_0x16eaae === _0xea4697(0x17a)) {
                    _0x219cad !== undefined ? _0x219cad[_0xea4697(0x188)](_0xea4697(0x180), _0x29f691['user']) : '';
                    if (_0x57517a) {
                        _0x29f691['logout']()['then'](() => {
                            const _0x30875d = _0xea4697;
                            setStatus(_0xdcb351, _0x30875d(0x18f)), _0x219cad[_0x30875d(0x188)](_0x30875d(0x177));
                        });
                        return;
                    }
                    setStatus(_0xdcb351, 'Connected');
                }
            }
            _0x12cafe && qrcode[_0xea4697(0x183)](_0x12cafe, (_0x55b1af, _0x1edff4) => {
                const _0x5b9495 = _0xea4697;
                if (_0x55b1af) console['log'](_0x55b1af);
                _0x219cad !== undefined ? _0x219cad['emit'](_0x5b9495(0x16e), _0x1edff4) : '';
            });
        }), _0x29f691['ev']['on'](_0x26c29e(0x181), _0x3b8c14 => autoReply(_0x3b8c14, _0x29f691)), _0x29f691['ev']['on'](_0x26c29e(0x192), _0x2ca2e7), {
            'conn': _0x29f691,
            'state': _0x1764fb
        };
    };

function _0x56ab() {
    const _0x270b43 = ['messages.upsert', 'currentVersion', 'toDataURL', '1327782OODXep', 'Success\x20initialize\x20', '1969932ewLMvH', '10qeRJby', 'emit', 'https://web.whatsapp.com/check-update?version=1&platform=web', '88PdSBOW', 'axios', '26448389MJYDUJ', 'body', '@adiwajshing/baileys', 'Disconnect', '15thevhf', 'statusCode', 'creds.update', '1234808vXJreT', 'log', './session-', 'split', 'silent', '.json', 'get', 'connection.update', 'output', 'forEach', '292TXbbfP', 'unlinkSync', 'QrGenerated', 'qrcode', 'Desktop', 'message', '4107aNTpjv', 'existsSync', 'pino', '425259TlHEBC', 'Restart\x20Required', 'Proccess', 'loggedOut', 'error', 'open', 'session-', 'data', 'SELECT\x20*\x20FROM\x20numbers\x20WHERE\x20status\x20=\x20\x22Connected\x22', 'close', '825741PNEolE', 'Authenticated'];
    _0x56ab = function() {
        return _0x270b43;
    };
    return _0x56ab();
}
setInterval(async () => {
    const _0xe73fe9 = _0x282e25,
        _0x51ac0d = await dbQuery(_0xe73fe9(0x17d));
    _0x51ac0d[_0xe73fe9(0x16b)](async _0x426770 => {
        const _0x272f81 = _0xe73fe9;
        fs[_0x272f81(0x173)](_0x272f81(0x17b) + _0x426770[_0x272f81(0x18d)] + _0x272f81(0x198)) && (startCon(_0x426770[_0x272f81(0x18d)]), console[_0x272f81(0x194)](_0x272f81(0x185) + _0x426770[_0x272f81(0x18d)] + '\x20Device'));
    });
}, 0x249f0), module['exports'] = {
    'startCon': startCon
};