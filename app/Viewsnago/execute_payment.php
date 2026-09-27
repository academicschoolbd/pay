<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Secure Payment - <?= get_option('site_name', 'pay.institution.bd') ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_SITE . get_option('site_icon', BASE_SITE . "assets/images/favicon.png") ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla:ital@0;1&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <?= link_asset('css/style4.css') ?>
    <?= link_asset('toast/toastr.min.css') ?>
    <?= script_asset('js/jquery.js') ?>
    <?= script_asset('toast/toastr.min.js') ?>
    <style>
        :root {
            --bg1: #ED2730;
            --bg2: #F7962A;
        }
        .font-bangla, body, button, input, select, textarea, h1, h2, h3, h4, h5, h6, p, span, a, label, td, th {
            font-family: 'Tiro Bangla', 'SolaimanLipi', 'Noto Sans Bengali', 'Inter', -apple-system, sans-serif !important;
        }
    </style>

</head>

<body class="w-full min-h-screen sm:h-auto sm:p-12 sm:flex sm:items-center sm:justify-center">
    <div id="loader">
        <div class="loader">
        </div>
    </div>
    <div class="up-container max-w-md overflow-hidden mx-auto p-8 relative sm:bg-white sm:rounded-lg sm:shadow-lg sm:shadow-[#0057d0]/10 sm:min-w-[650px] sm:flex sm:flex-wrap">
        <div class="w-full h-12 shadow-md shadow-[#0057d0]/5 rounded-lg overflow-hidden flex justify-between items-center p-5 bg-white sm:bg-[#fbfcff]  sm:shadow-none sm:ring-1 sm:ring-[#0057d0]/10">
            <div class>
                <a href="<?= BASE_SITE; ?>">
                    <svg width="16" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18V10H11V18" stroke="#94A9C7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M1 6.95L8.5 1L16 6.95V16.3C16 16.7509 15.8244 17.1833 15.5118 17.5021C15.1993 17.8209 14.7754 18 14.3333 18H2.66667C2.22464 18 1.80072 17.8209 1.48816 17.5021C1.17559 17.1833 1 16.7509 1 16.3V6.95Z" stroke="#6D7F9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
            <button onclick="window.location.href='<?= base_url("api/execute/" . $all_info['tmp_ids']); ?>'">
                <svg width="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.5 1C4.80558 1 1 4.80558 1 9.5C1 14.1944 4.80558 18 9.5 18C14.1944 18 18 14.1944 18 9.5C18 4.80558 14.1944 1 9.5 1Z" stroke="#6D7F9A" stroke-width="1.5"></path>
                    <path d="M10.7749 12.9L7.3749 9.50002L10.7749 6.10002" stroke="#94A9C7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </div>

        <div class="w-full mb-8">
            <div class="flex flex-col sm:flex-row flex-wrap mt-5 sm:justify-between sm:items-center">

                <div class="bg-white shadow shadow-[#0057d0]/5 rounded-lg px-5 py-3 sm:h-[85px] flex items-center sm:w-[70%] sm:shadow-none sm:ring-1 sm:ring-[#0057d0]/10">
                    <div class="w-[55px] h-[55px] p-1.5 flex justify-center items-center mr-4 ring-1 ring-[#0057d0]/10 rounded-full">
                        <img src="<?= BASE_SITE . $all_info['brand_logo'] ?>" alt="<?= $all_info['brand_name']  ?>" class="w-[80%]">
                    </div>
                    <div class="flex flex-col">
                        <h3 class="font-semibold text-[#6D7F9A] text-sm"><?= $all_info['brand_name'] ?></h3>
                        <div class="flex items-center gap-1.5 mt-0.5">
                            <span class="text-[#94a9c7] text-xs">Invoice ID: <strong class="text-[#6D7F9A] font-bold"><?= $all_info['transaction_id'] ?></strong></span>
                            <button type="button" class="px-2 py-0.5 rounded bg-amber-400 text-slate-950 font-black text-[10px] hover:bg-amber-300 transition copy" data-clipboard-text="<?= $all_info['transaction_id'] ?>">
                                📋 Copy ID
                            </button>
                        </div>
                    </div>
                </div>
                <div class="shadow shadow-[#0057d0]/5 rounded-lg py-3 px-2 sm:h-[85px] flex flex-col sm:items-center sm:justify-center sm:shadow-none sm:ring-1 sm:ring-[#0057d0]/10 mt-3 sm:w-[25%] sm:mt-0">

                    <div class="w-full h-20 mb-4 sm:mt-0 flex justify-center items-center">
                        <img src="<?= BASE_SITE . payment_option($setting['g_type']) ?>" alt="<?= $setting['g_type'] ?>" class="h-[80%]">
                    </div>
                </div>
            </div>


            <div class="method">
                <!-- Live Radar Waiting Bar & Expiry Timer -->
                <div class="w-full my-3 p-3.5 bg-[#00000040] border border-amber-500/40 rounded-xl text-center font-bangla font-bold text-amber-300 shadow">
                    <div class="flex items-center justify-center gap-2 mb-1">
                        <span class="relative flex h-3 w-3 me-1">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                        </span>
                        <span>পেমেন্ট ভেরিফিকেশনের জন্য অপেক্ষা করা হচ্ছে...</span>
                    </div>
                    <small class="text-xs text-slate-300 font-sans block">⏰ Time Remaining: <span id="payTimer">14:59</span></small>
                </div>

                <div class="brand-bg p-5 mt-3 rounded-lg overflow-auto">
                    <?php
                    if ($setting['t_type'] == 'bank') {
                        $file = __DIR__ . '/methods/bank.php';
                        include $file;
                    } else {
                        $file = __DIR__ . '/methods/' . $setting['g_type'] . '.php';
                        if (file_exists($file)) {
                            include $file;
                        }
                    }

                    $appLauncherMap = [
                        'bkash'  => ['name' => 'bKash App', 'package' => 'com.bKash.customerapp', 'scheme' => 'bkash://', 'color' => 'bg-pink-600 hover:bg-pink-500'],
                        'nagad'  => ['name' => 'Nagad App', 'package' => 'com.konasl.nagad', 'scheme' => 'nagad://', 'color' => 'bg-amber-600 hover:bg-amber-500'],
                        'rocket' => ['name' => 'Rocket App', 'package' => 'com.dbbl.mbs.apps.main', 'scheme' => 'rocket://', 'color' => 'bg-purple-600 hover:bg-purple-500'],
                        'upay'   => ['name' => 'Upay App', 'package' => 'com.upay.customer', 'scheme' => 'upay://', 'color' => 'bg-blue-600 hover:bg-blue-500']
                    ];

                    $methodKey = strtolower($setting['g_type'] ?? 'bkash');
                    $appInfo = $appLauncherMap[$methodKey] ?? null;
                    if ($appInfo):
                    ?>
                    <!-- 1-Click MFS App Launcher Button -->
                    <div class="my-3 text-center">
                        <a href="intent://#Intent;scheme=<?= $appInfo['scheme'] ?>;package=<?= $appInfo['package'] ?>;end;" class="inline-flex items-center justify-center gap-2 w-full py-3 px-4 rounded-xl <?= $appInfo['color'] ?> text-white font-black text-sm shadow-md transition transform hover:scale-[1.02] text-decoration-none">
                            <i class="fa-solid fa-mobile-screen fs-5 me-1"></i> Open <?= $appInfo['name'] ?>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php
                    $ytUrl = get_value($setting['params'], 'yt_video') ?: 'https://www.youtube.com/embed/9bZkp7q19f0';
                    if (!empty($ytUrl)):
                        if (str_contains($ytUrl, 'watch?v=')) {
                            $ytUrl = str_replace('watch?v=', 'embed/', $ytUrl);
                        }
                    ?>
                    <!-- Embedded YouTube Video Guide Container -->
                    <div class="my-4 p-3.5 bg-black/60 rounded-xl border border-slate-700 space-y-2 text-start">
                        <div class="flex items-center gap-2 text-xs font-extrabold text-red-400 uppercase tracking-wider mb-2">
                            <i class="fa-brands fa-youtube fs-5 text-red-500 me-1"></i>
                            <span>ভিডিও টিউটোরিয়াল: কিভাবে পেমেন্ট করবেন (Video Guide)</span>
                        </div>
                        <div class="aspect-video w-full rounded-lg overflow-hidden border border-slate-800 bg-black">
                            <iframe class="w-full h-full" src="<?= esc($ytUrl) ?>" title="How to Pay Video Tutorial" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Toggle Button for Manual TrxID Entry -->
                    <div class="text-center my-4">
                        <button type="button" onclick="toggleManualTrxId()" class="w-full py-3 px-4 rounded-xl bg-amber-500/20 border border-amber-500/50 text-amber-300 font-bangla font-bold text-xs hover:bg-amber-500/30 transition">
                            🔑 রেফারেন্স ছাড়া পেমেন্ট করেছেন? এখানে TrxID দিয়ে ভেরিফাই করুন
                        </button>
                    </div>

                    <!-- Collapsible Manual TrxID Input Section -->
                    <div id="manualTrxIdSection" class="hidden transition-all duration-300 mt-3">
                        <div class="text-center transaction">
                            <h2 class="mb-3 font-semibold text-white font-bangla text-sm">ট্রান্সজেকশন আইডি দিন (TrxID)</h2>
                            <input type="text" id="transaction_id" name="transaction_id" placeholder="ট্রান্সজেকশন আইডি দিন" class="font-bangla appearance-none w-full text-[15px] rounded-[10px] sm:bg-[#fbfcff] shadow shadow-[#0057d0]/5 px-5 py-3.5 placeholder-[#94A9C7] focus:outline-none focus:ring-1 focus:ring-[#0057d0]" maxlength="14" autocomplete="off">
                        </div>
                        <div class="w-full rounded-xl py-3.5 mt-3 text-center payment_submit_done payment_submit_btn font-semibold text-white cursor-pointer bg-emerald-600 hover:bg-emerald-500 transition" data-tmp_id="<?= session('tmp_ids') ?>" data-href="<?= base_url('api/save_payment/' . $setting['g_type'] . '?acc_tp=' . @$_GET['acc_tp']) ?>"> VERIFY TRXID </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Floating WhatsApp Support Button -->
    <a href="https://wa.me/8801518926933?text=Hello%2C+I+need+help+with+Payment+Ref+<?= urlencode($all_info['transaction_id'] ?? '') ?>" target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-[999999] flex items-center justify-center gap-2 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white font-black text-xs px-4 py-3 shadow-2xl transition transform hover:scale-105 text-decoration-none">
        <i class="fa-brands fa-whatsapp text-lg"></i>
        <span>Need Help? Chat on WhatsApp</span>
    </a>

    <script>
        function playSuccessChime() {
            try {
                var ctx = new (window.AudioContext || window.webkitAudioContext)();
                var o = ctx.createOscillator();
                var g = ctx.createGain();
                o.type = 'sine';
                o.frequency.setValueAtTime(587.33, ctx.currentTime);
                o.frequency.setValueAtTime(880.00, ctx.currentTime + 0.15);
                g.gain.setValueAtTime(0.3, ctx.currentTime);
                g.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.5);
                o.connect(g);
                g.connect(ctx.destination);
                o.start();
                o.stop(ctx.currentTime + 0.5);
            } catch(e) {}
        }

        function fireSuccessConfetti() {
            try {
                if (typeof confetti === 'function') {
                    confetti({ particleCount: 120, spread: 80, origin: { y: 0.6 } });
                }
            } catch(e) {}
        }

        // Real-time 2-Second Payment Auto-Verifier Poller
        (function startAutoVerifierPoller() {
            var refCode = "<?= $all_info['transaction_id'] ?? '' ?>";
            if (!refCode) return;

            var poller = setInterval(async function() {
                try {
                    var res = await fetch('<?= BASE_SITE ?>api/payment-status?ref=' + encodeURIComponent(refCode)).then(r => r.json());
                    if (res && res.completed) {
                        clearInterval(poller);
                        playSuccessChime();
                        fireSuccessConfetti();
                        toastr.success('🎉 Your Payment Success! Redirecting to original page...');
                        setTimeout(function() {
                            window.location.href = "<?= $all_info['success_url'] ?? base_url() ?>";
                        }, 1200);
                    }
                } catch (e) {}
            }, 2000);
        })();

        // 15-Minute Expiry Countdown Timer
        (function startCountdownTimer() {
            var sec = 899;
            var tEl = document.getElementById('payTimer');
            if (!tEl) return;
            var timer = setInterval(function() {
                var m = Math.floor(sec / 60);
                var s = sec % 60;
                tEl.textContent = (m < 10 ? '0' + m : m) + ':' + (s < 10 ? '0' + s : s);
                if (--sec < 0) {
                    clearInterval(timer);
                    tEl.textContent = 'EXPIRED';
                    toastr.warning('⚠️ Invoice time expired. Please generate a new invoice.');
                }
            }, 1000);
        })();

        function toggleManualTrxId() {
            var sec = document.getElementById('manualTrxIdSection');
            if (sec) {
                sec.classList.toggle('hidden');
                sec.scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>

    <script>
        var token = '<?= csrf_hash() ?>';
        $('.payment_submit_done').on("click", function(event) {
            event.preventDefault();
            var element = $(this),
                url = element.attr("data-href"),
                tmp_id = element.attr("data-tmp_id"),
                t_type = "<?= $setting['t_type'] ?>",
                transaction_id = $('#transaction_id').val(),
                acc_tp = "<?= $_GET['acc_tp'] ?? '' ?>",
                data = $.param({
                    token: token,
                    tmp_id: tmp_id,
                    transaction_id: transaction_id,
                    t_type: t_type,
                    acc_tp: acc_tp
                });

            element.prop("disabled", true);
            element.html('<p style="color:blue">🕥 Loading...</p>');
            $("#loader").css("display", "flex");
            setTimeout(function() {
                $.post(url, data, function(_result) {
                    showToast(_result.message, _result.status);
                    if (_result.redirect) {
                        setTimeout(function() {
                            window.location.replace(_result.redirect);
                        }, 1000);
                    }
                }, 'json').always(function() {
                    element.prop("disabled", false);
                    element.html('CONFIRM');
                    $("#loader").css("display", "none");
                });
            }, 1000);
        });


        $(document).on("click", ".copy", function() {
            let vl = $(this).attr('data-clipboard-text'),
                params = {
                    'type': 'text',
                    'value': vl,
                };
            copyToClipBoard(params, 'toast')
        });
    </script>

    <?php if (!empty($setting['t_type']) && $setting['t_type'] == 'bank') { ?>
        <script type="text/javascript">
            $('.transaction').css('display', 'none');
            $(document).ready(function() {
                $(document).on('change', '#ajaxUpload', function() {
                    var property = document.getElementById('ajaxUpload').files[0];
                    var _that = $(this),
                        _action = "<?= base_url('api/upload_files'); ?>";

                    var form_data = new FormData();
                    form_data.append("files[]", property);
                    $.ajax({
                        url: _action,
                        method: 'POST',
                        dataType: 'JSON',
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $("#loader").css("display", "flex");
                        },
                        success: function(response) {
                            $("#loader").css("display", "none");
                            if (response.status == 'success') {
                                $('#transaction_id').val(response.link);
                            }
                            showToast(response.message, response.status);

                        }
                    });
                });
            });
        </script>
    <?php } ?>

</body>

</html>
