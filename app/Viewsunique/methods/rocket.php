<style>
    :root {
        --bg1: #89288f;
        --bg2: #89288f
    }
</style>
<style>
        .text-yellow-300 {
            color: #FFD700;
        }
        .font-bangla {
       color: white;
       }
       .copy {
    color: white;
    }
    </style>
<?php

$acc_tp = decrypt($_GET['acc_tp']);
if ($acc_tp == 'personal') :
?>
    <div class="mb-20 space-y-4">
        <!-- Phase 1: Rocket 12-Digit Account Persistence Input -->
        <div class="p-4 bg-purple-950/80 border-2 border-purple-500 rounded-2xl shadow-lg text-white space-y-2">
            <label class="font-bangla font-extrabold text-sm text-purple-300 block">
                📱 আপনার ১২ ডিজিটের রকেট ওয়ালেট নম্বরটি লিখুন (Enter 12-Digit Rocket Wallet Number):
            </label>
            <div class="flex items-center gap-2">
                <input type="tel" id="rocket_wallet_number" name="rocket_wallet_number" placeholder="017XXXXXXXXX" maxlength="12" value="<?= esc(session('rocket_phone_' . $all_info['transaction_id']) ?? '') ?>" class="font-bold text-lg text-amber-300 bg-black/80 px-4 py-2.5 rounded-xl border border-purple-500/50 w-full focus:outline-none focus:border-amber-400">
                <button type="button" onclick="saveRocketWalletNumber()" class="px-4 py-2.5 rounded-xl bg-amber-400 text-slate-950 font-black text-xs hover:bg-amber-300 transition shrink-0">
                    পরবর্তী ধাপ (Next)
                </button>
            </div>
            <small class="text-xs text-slate-300 block font-bangla">✓ আপনার রকেট নম্বরের শেষ ৩ ডিজিট স্বয়ংক্রিয়ভাবে অ্যাকাউন্ট ভেরিফাই করতে ব্যবহৃত হবে।</small>
        </div>

        <ul class="mt-4 text-slate-200">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">*322# ডায়াল করে আপনার ROCKET মোবাইল মেনুতে অথবা ROCKET অ্যাপে যান।</p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">
                    <span class="text-yellow-300 font-semibold ml-1">"Send Money"</span> -এ ক্লিক করুন।
                </p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="sm:w-[90%] font-bangla">প্রাপক নম্বর হিসেবে এই নম্বরটি লিখুনঃ <span class="text-yellow-300 font-semibold ml-1 "><?= get_value($setting['params'], 'personal_number') ?></span>
                    <a href="#" class="px-2 py-0.5 mx-2 rounded-md inline-block bg-[#00000040] copy" data-clipboard-text="<?= get_value($setting['params'], 'personal_number') ?>">&#x2398;Copy</a>
                </p>
            </li>

            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">টাকার পরিমাণঃ <span class="text-yellow-300 font-semibold ml-1"> <?= currency_format($all_info['total_amount']) ?></span></p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">নিশ্চিত করতে এখন আপনার ROCKET মোবাইল মেনু পিন লিখুন।</p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">সবকিছু ঠিক থাকলে, আপনি ROCKET থেকে একটি নিশ্চিতকরণ বার্তা পাবেন।</p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">এখন উপরের বক্সে আপনার<span class="text-yellow-300 font-semibold ml-1">Transaction ID</span> দিন এবং নিচের<span class="text-yellow-300 font-semibold ml-1">VERIFY</span> বাটনে ক্লিক করুন।</p>
            </li>
        </ul>
    </div>
<?php elseif ($acc_tp == 'agent') : ?>
    <div class="mb-20">
        <ul class="mt-5 text-slate-200">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">*322# ডায়াল করে আপনার ROCKET মোবাইল মেনুতে অথবা ROCKET অ্যাপে যান।</p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">
                    <span class="text-yellow-300 font-semibold ml-1">"Cash Out"</span> -এ ক্লিক করুন।
                </p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="sm:w-[90%] font-bangla">প্রাপক নম্বর হিসেবে এই নম্বরটি লিখুনঃ <span class="text-yellow-300 font-semibold ml-1 "><?= get_value($setting['params'], 'agent_number') ?></span>
                    <a href="#" class="px-2 py-0.5 mx-2 rounded-md inline-block bg-[#00000040] copy" data-clipboard-text="<?= get_value($setting['params'], 'agent_number') ?>">&#x2398;Copy</a>
                </p>
            </li>


            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">টাকার পরিমাণঃ <span class="text-yellow-300 font-semibold ml-1"> <?= currency_format($all_info['total_amount']) ?></span></p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">নিশ্চিত করতে এখন আপনার ROCKET মোবাইল মেনু পিন লিখুন।</p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">সবকিছু ঠিক থাকলে, আপনি ROCKET থেকে একটি নিশ্চিতকরণ বার্তা পাবেন।</p>
            </li>
            <hr class="brand-hr my-3">
            <li class="flex text-sm">
                <div><span class="inline-block w-1.5 h-1.5 mr-2 bg-white rounded-full mb-0.5"></span>
                </div>
                <p class="font-bangla">এখন উপরের বক্সে আপনার<span class="text-yellow-300 font-semibold ml-1">Transaction ID</span> দিন এবং নিচের<span class="text-yellow-300 font-semibold ml-1">VERIFY</span> বাটনে ক্লিক করুন।</p>
            </li>
        </ul>
    </div>
<?php endif; ?>